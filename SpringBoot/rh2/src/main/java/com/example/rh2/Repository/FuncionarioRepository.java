package com.example.rh2.Repository;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import com.example.rh2.Model.Funcionario;
import java.util.List;


public interface FuncionarioRepository extends CrudRepository<Funcionario, Long> {
    // Permitir a urilização dos métodos do crud no JPA
    // Métodos Auxiliares
    Funcionario findById(long id); // Buscar um funcionário pelo id
    Funcionario findByNome(String nome);

    // Buscar funcionário por parte do nome
    @Query(value = "select u from Funcionario u where u.nome like %?1%")
    List<Funcionario> findByLetras(String letras);
}
