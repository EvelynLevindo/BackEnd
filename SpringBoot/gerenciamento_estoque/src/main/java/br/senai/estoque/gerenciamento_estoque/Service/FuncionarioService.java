package br.senai.estoque.gerenciamento_estoque.Service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import br.senai.estoque.gerenciamento_estoque.Model.Funcionario;
import br.senai.estoque.gerenciamento_estoque.Repository.FuncionarioAutenticadoRepository;
import br.senai.estoque.gerenciamento_estoque.Repository.FuncionarioRepository;
import java.util.Optional;

@Service
public class FuncionarioService {
   
    @Autowired
    private FuncionarioRepository funcionarioRepository;

    @Autowired
    private FuncionarioAutenticadoRepository funcionarioAutenticadoRepository;

    public boolean cadastrar(String nif, String nome, String senha) {
        boolean autorizado = funcionarioAutenticadoRepository.existsByNifAndNomeAndAtivoTrue(nif, nome);
       
        if (!autorizado) {
            return false;
        }

        if (funcionarioRepository.existsByNif(nif)) {
            return false;
        }
        Funcionario novo = new Funcionario();
        novo.setNome(nome);
        novo.setNif(nif);
        novo.setSenha(senha);

        funcionarioRepository.save(novo);
        return true;
    }

    public boolean validarLogin(String nif, String senha) {
        Optional<Funcionario> func = funcionarioRepository.findByNif(nif);
        return func.isPresent() && func.get().getSenha().equals(senha);
    }
}