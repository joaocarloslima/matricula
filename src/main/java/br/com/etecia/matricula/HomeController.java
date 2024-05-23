package br.com.etecia.matricula;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import br.com.etecia.matricula.request.CpfRequest;
import jakarta.validation.Valid;

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
    public String criarRegistroDeResposta(@Valid CpfRequest cpfRequest, BindingResult result) {
        if (result.hasErrors()) return "index";
        repository.save(new Matricula(cpfRequest.getCpf()));
        return "redirect:/normas";
    }

}
