package br.com.etecia.matricula.request;

import lombok.Data;

@Data
public class DeficienciasRequest {
    
    private Boolean auditiva;
    private Boolean fisica;
    private Boolean intelectual;
    private Boolean visual;

}
