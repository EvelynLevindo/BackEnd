package br.senai.estoque.gerenciamento_estoque.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;


@Controller
public class HomeController {
    
    @GetMapping("/")
    public String index() {
        return "index";
    }
    
}