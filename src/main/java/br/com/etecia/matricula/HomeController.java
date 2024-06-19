package br.com.etecia.matricula;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import br.com.etecia.matricula.request.CpfRequest;
import jakarta.servlet.http.HttpSession;
import jakarta.validation.Valid;
import org.springframework.web.bind.annotation.RequestParam;


@Controller
@RequestMapping
public class HomeController {
    
    private final Repository repository;

    public HomeController(Repository repository) {
        this.repository = repository;
    }

    @GetMapping
    public String index(CpfRequest cpfRequest){
        return "index";
    }

    @PostMapping
    public String criarRegistroDeResposta(@Valid CpfRequest cpfRequest, BindingResult result, HttpSession session) {
        if (result.hasErrors()) return "index";

        var matricula = repository.findByCpf(cpfRequest.getCpf()).orElse(
            new Matricula(cpfRequest.getCpf())
        );

        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/normas";
    }

    @GetMapping("/fim")
    public String fim(HttpSession session, Model model) {
        return "fim";
    }

    @GetMapping("adm")    
    public String admin(Model model) {
        model.addAttribute("responses", repository.findAll());
        return "adm/index";
    }

    @GetMapping("adm/normas/{id}")
    public String normas(@PathVariable Long id, Model model) {
        if (!repository.existsById(id)) throw new RuntimeException("Matrícula não encontrada");

        bloquearMatricula(id);

        model.addAttribute("matricula", repository.findById(id).get());
        return "adm/normas";
    }

    @GetMapping("adm/block/{id}")
    public String block(@PathVariable Long id) {
        if (!repository.existsById(id)) throw new RuntimeException("Matrícula não encontrada");
        var matricula = repository.findById(id).get();
        //toggle bloqueado
        matricula.setBloqueado( !matricula.isBloqueado() );
        repository.save(matricula);
        return "redirect:/adm";
    }

    private void bloquearMatricula(Long id) {
        var matricula = repository.findById(id).get();
        matricula.setBloqueado(true);
        repository.save(matricula);
    }    

}
