package com.example.rh.Repository;

import java.util.List;

import org.springframework.data.repository.CrudRepository;
import org.springframework.data.jpa.repository.Query;
import com.example.rh.Model.Funcionario;

public interface FuncionarioRepository extends CrudRepository<Funcionario, Long>{
    // métodos para realizar o crud do Funcionario
    //criar uma busca pela chave primaria do Funcionario
    Funcionario findById (long id);

    //Busca pelo nome
    Funcionario findByNome (String nome);

    //Busca para vários nomes
    @Query(value = "Select u from Funcionario u where u.nome like %?1%")
    List<Funcionario>findByNomes(String nome);

}
