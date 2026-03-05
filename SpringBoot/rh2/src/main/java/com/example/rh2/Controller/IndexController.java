package com.example.rh2.Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;

import com.example.rh2.Repository.FuncionarioRepository;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;


// Anotação de classe Controller do Springboot
@Controller
public class IndexController {
    
    // Atributo
    @Autowired
    FuncionarioRepository fr; // Executar o Crud

    @GetMapping("/")
    public String abrirIndex() {
        // Será criado fututramente uma mensagem de saudação
        return "index";
    }
    
}
