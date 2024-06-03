package br.com.etecia.matricula;

import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;

public interface Repository extends JpaRepository<Matricula, Long>{

    Optional<Matricula> findByCpf(String cpf);

    
} 
