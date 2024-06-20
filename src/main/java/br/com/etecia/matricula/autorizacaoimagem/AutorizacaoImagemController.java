package br.com.etecia.matricula.autorizacaoimagem;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import br.com.etecia.matricula.Matricula;
import br.com.etecia.matricula.Repository;
import br.com.etecia.matricula.request.QualResquest;
import jakarta.servlet.http.HttpSession;

@Controller
@RequestMapping("autorizacao-imagem")
public class AutorizacaoImagemController {

    @Autowired
    private Repository repository;

    @GetMapping
    public String index(){
        return "autorizacao-imagem/index";
    }

    @PostMapping
    public String salvar(HttpSession session, QualResquest qual){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setAutorizacaoImagem(qual.getQual() != null );
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/identificacao";
        
    }
    
}
