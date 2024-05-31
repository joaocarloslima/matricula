package br.com.etecia.matricula.normas;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("normas")
public class NormasController {

    @GetMapping
    public String index(){
        return "normas/index";
    }
    
}
