package br.com.etecia.matricula.request;

import java.time.LocalDate;

import jakarta.validation.constraints.NotBlank;
import jakarta.validation.constraints.Past;
import lombok.Data;

@Data
public class IdentificacaoRequest {

    @NotBlank(message = "Nome é obrigatório")
    private String nome;

    @NotBlank(message = "Data de Nascimento é obrigatória")
    @Past(message = "Data de Nascimento deve ser no passado")
    private LocalDate dataNascimento;

    @NotBlank(message = "Curso é obrigatório")
    private String curso;
    
}
