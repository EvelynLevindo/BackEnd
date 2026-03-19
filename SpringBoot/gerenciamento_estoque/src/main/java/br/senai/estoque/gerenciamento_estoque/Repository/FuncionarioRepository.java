package br.senai.estoque.gerenciamento_estoque.Repository;

import java.util.Optional;
import org.springframework.data.jpa.repository.JpaRepository;
import br.senai.estoque.gerenciamento_estoque.Model.Funcionario;

public interface FuncionarioRepository extends JpaRepository<Funcionario, Long>{
    Optional<Funcionario>findByNif(String nif);
    boolean existsByNif(String nif);    
}
