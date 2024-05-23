package br.com.etecia.matricula.normas;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("normas")
public class NormasController {

    @RequestMapping
    public String index(){
        return "normas/index";
    }
    
}
