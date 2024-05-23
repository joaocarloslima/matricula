package br.com.etecia.matricula.request;

import org.hibernate.validator.constraints.br.CPF;

import lombok.Data;

@Data
public class CpfRequest {
    @CPF(message = "CPF Inválido") String cpf;
}
