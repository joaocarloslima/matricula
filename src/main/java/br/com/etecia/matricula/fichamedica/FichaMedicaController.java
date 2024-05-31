package br.com.etecia.matricula.fichamedica;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import br.com.etecia.matricula.Matricula;
import br.com.etecia.matricula.Repository;
import br.com.etecia.matricula.request.IdentificacaoRequest;
import jakarta.servlet.http.HttpSession;

@Controller
@RequestMapping("ficha-medica")
public class FichaMedicaController {

    private Repository repository;

    public FichaMedicaController(Repository repository) {
        this.repository = repository;
    }
    
    @GetMapping("identificacao")
    public String identificacao(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/identificacao";
    }

    @PostMapping("identificacao")
    public String salvarIdentificacao(HttpSession session, IdentificacaoRequest identificacao){
        Matricula matricula = (Matricula) session.getAttribute("matricula");
        matricula.setNome(identificacao.getNome());
        matricula.setDataNascimento(identificacao.getDataNascimento());
        matricula.setCurso(identificacao.getCurso());
        repository.save(matricula);
        return "redirect:/ficha-medica/identificacao";
    }

}
