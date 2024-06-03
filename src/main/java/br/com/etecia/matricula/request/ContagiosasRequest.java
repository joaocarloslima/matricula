package br.com.etecia.matricula.request;

import lombok.Data;

@Data
public class ContagiosasRequest {
    
    private Boolean sarampo;
    private Boolean coqueluche;
    private Boolean rubeola;
    private Boolean catapora;
    private Boolean caxumba;
    private Boolean tuberculose;

}
