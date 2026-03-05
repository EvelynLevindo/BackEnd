package com.example.escola_xyz.Repository;

import com.example.escola_xyz.Model.Administrador;
import org.springframework.data.repository.CrudRepository;


public interface AdministradorRepository extends CrudRepository<Administrador,String>{
    // Se precisar criar algum método específico de busca no banco de dados, eu crio aqui

    Administrador findByCpf(String cpf); // Busca pelo cpf no banco
}

