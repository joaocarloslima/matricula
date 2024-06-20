package br.com.etecia.matricula;

import java.time.LocalDate;
import java.util.Random;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Entity
@NoArgsConstructor
@AllArgsConstructor
public class Matricula {
    @Id @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private boolean autorizacaoImagem;
    private String cpf;
    private String nome;
    private String curso;
    private LocalDate dataNascimento;
    private String nomeContato;
    private String telefoneContato;
    private String parentesco;
    private Boolean amigdalite;
    private Boolean bronquite;
    private Boolean diabetes;
    private Boolean sinusite;
    private Boolean palpitacao;
    private Boolean hemorragia;
    private Boolean faltadear;
    private Boolean convulsao;
    private Boolean sarampo;
    private Boolean coqueluche;
    private Boolean rubeola;
    private Boolean catapora;
    private Boolean caxumba;
    private Boolean tuberculose;
    private Boolean fisica;
    private Boolean auditiva;
    private Boolean visual;
    private Boolean intelectual;
    private String crecimento;
    private String desenvolvimento;
    private String tratamento;
    private String medicacao;
    private String cirurgia;
    private String alergia;
    private String observacao;
    @Column(columnDefinition = "boolean default false")
    private boolean bloqueado = false;
    
    public Matricula(String cpf) {
        this.cpf = cpf;
    }

}
