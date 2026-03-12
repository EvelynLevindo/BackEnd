package br.senai.estoque.gerenciamento_estoque.Service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.senai.estoque.gerenciamento_estoque.Model.Funcionario;
import br.senai.estoque.gerenciamento_estoque.Repository.FuncionarioAutenticadoRepository;
import br.senai.estoque.gerenciamento_estoque.Repository.FuncionarioRepository;
import br.senai.estoque.gerenciamento_estoque.Repository.FuncionarioRepository;

import java.util.Optional;

@Service
public class FuncionarioService {
   
    @Autowired
    private FuncionarioRepository funcionarioRepository;

    @Autowired
    private FuncionarioAutenticadoRepository autenticadoRepository;

    public String cadastrar(String nome, String nif, String senha) {
        boolean autorizado = autenticadoRepository.existsByNifAndNomeAndAtivoTrue(nif, nome);
       
        if (!autorizado) {
            return "NIF ou Nome não autorizados para cadastro.";
        }

        if (funcionarioRepository.existsByNif(nif)) {
            return "Este NIF já possui uma conta cadastrada.";
        }
        Funcionario novo = new Funcionario();
        novo.setNome(nome);
        novo.setNif(nif);
        novo.setSenha(senha);

        funcionarioRepository.save(novo);
        return "sucesso";
    }

    public boolean validarLogin(String nif, String senha) {
        Optional<Funcionario> func = funcionarioRepository.findByNif(nif);
        return func.isPresent() && func.get().getSenha().equals(senha);
    }
}