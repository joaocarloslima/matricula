package br.com.etecia.matricula.fichamedica;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import br.com.etecia.matricula.Matricula;
import br.com.etecia.matricula.Repository;
import br.com.etecia.matricula.request.ContagiosasRequest;
import br.com.etecia.matricula.request.ContatoResquest;
import br.com.etecia.matricula.request.DeficienciasRequest;
import br.com.etecia.matricula.request.DoencasRequest;
import br.com.etecia.matricula.request.IdentificacaoRequest;
import br.com.etecia.matricula.request.QualResquest;
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

    @GetMapping("contato")
    public String contato(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/contato";
    }

    @GetMapping("doencas")
    public String doencas(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/doencas";
    }

    @GetMapping("deficiencias")
    public String deficiencias(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/deficiencias";
    }

    @GetMapping("contagiosas")
    public String contagiosas(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/contagiosas";
    }

    @GetMapping("crescimento")
    public String crescimento(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/crescimento";
    }

    @GetMapping("desenvolvimento")
    public String desenvolvimento(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/desenvolvimento";
    }

    @GetMapping("tratamento")
    public String tratamento(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/tratamento";
    }

    @GetMapping("medicacao")
    public String medicacao(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/medicacao";
    }

    @GetMapping("cirurgia")
    public String cirurgia(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/cirurgia";
    }

    @GetMapping("alergia")
    public String alergia(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/alergia";
    }

    @GetMapping("observacoes")
    public String observacoes(HttpSession session, Model model){
        model.addAttribute("matricula", session.getAttribute("matricula"));
        return "ficha-medica/observacoes";
    }

    @PostMapping("identificacao")
    public String salvarIdentificacao(HttpSession session, IdentificacaoRequest identificacao){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setNome(identificacao.getNome());
        matricula.setDataNascimento(identificacao.getDataNascimento());
        matricula.setCurso(identificacao.getCurso());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/contato";
    }

    @PostMapping("contato")
    public String salvarContato(HttpSession session, ContatoResquest contato){
        Matricula m = (Matricula) session.getAttribute("matricula");
        System.out.println(m);
        
        Matricula matricula = repository.findById(m.getId()).get();
        System.out.println(matricula);
        matricula.setNomeContato(contato.getNomeContato());
        matricula.setTelefoneContato(contato.getTelefoneContato());
        matricula.setParentesco(contato.getParentesco());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/doencas";
    }

    @PostMapping("doencas")
    public String salvarDoencas(HttpSession session, DoencasRequest doencas){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setAmigdalite(doencas.getAmigdalite());
        matricula.setBronquite(doencas.getBronquite());
        matricula.setDiabetes(doencas.getDiabetes());
        matricula.setSinusite(doencas.getSinusite());
        matricula.setPalpitacao(doencas.getPalpitacao());
        matricula.setHemorragia(doencas.getHemorragia());
        matricula.setFaltadear(doencas.getFaltadear());
        matricula.setConvulsao(doencas.getConvulsao());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/contagiosas";

    }

    @PostMapping("contagiosas")
    public String salvarContagiosas(HttpSession session, ContagiosasRequest doencas){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setSarampo(doencas.getSarampo());
        matricula.setCoqueluche(doencas.getCoqueluche());
        matricula.setRubeola(doencas.getRubeola());
        matricula.setCatapora(doencas.getCatapora());
        matricula.setCaxumba(doencas.getCaxumba());
        matricula.setTuberculose(doencas.getTuberculose());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/deficiencias";

    }

    @PostMapping("deficiencias")
    public String salvarDeficiencias(HttpSession session, DeficienciasRequest doencas){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setAuditiva(doencas.getAuditiva());
        matricula.setFisica(doencas.getFisica());
        matricula.setIntelectual(doencas.getIntelectual());
        matricula.setVisual(doencas.getVisual());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/crescimento";

    }

    @PostMapping("crescimento")
    public String salvarCrescimento(HttpSession session, QualResquest qual){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setCrecimento(qual.getQual());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/desenvolvimento";
    }

    @PostMapping("desenvolvimento")
    public String salvarDesenvolvimento(HttpSession session, QualResquest qual){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setDesenvolvimento(qual.getQual());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/tratamento";
    }

    @PostMapping("tratamento")
    public String salvarTratamento(HttpSession session, QualResquest qual){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setTratamento(qual.getQual());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/medicacao";
    }

    @PostMapping("medicacao")
    public String salvarMedicacao(HttpSession session, QualResquest qual){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setMedicacao(qual.getQual());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/cirurgia";
    }

    @PostMapping("cirurgia")
    public String salvarCirurgia(HttpSession session, QualResquest qual){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setCirurgia(qual.getQual());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/alergia";
    }

    @PostMapping("alergia")
    public String salvarAlergia(HttpSession session, QualResquest qual){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        matricula.setAlergia(qual.getQual());
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/ficha-medica/observacoes";
    }

    @PostMapping("observacoes")
    public String salvarObservacoes(HttpSession session, QualResquest qual){
        Matricula m = (Matricula) session.getAttribute("matricula");
        Matricula matricula = repository.findById(m.getId()).get();
        var obs = qual.getQual() == null ? "" : qual.getQual();
        matricula.setObservacao(obs);
        repository.save(matricula);
        session.setAttribute("matricula", matricula);
        return "redirect:/fim";
    }

}
