package br.com.etecia.matricula.autorizacaoimagem;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("autorizacao-imagem")
public class AutorizacaoImagemController {

    @PostMapping
    public String index(){
        return "autorizacao-imagem/index";
    }
    
}
