package com.exemple.teste_thymeleaf;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
// import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.bind.annotation.PostMapping;
// import org.springframework.web.bind.annotation.RequestBody;



@Controller
public class IndexCrontroller {
    
    // Método de Requisição do Tipo GET
    @RequestMapping(value="/", method=RequestMethod.GET)
    public ModelAndView abrirIndex() {
        ModelAndView mv = new ModelAndView("index");
        String mensagem = "Olá, visitante!";
        mv.addObject("msg", mensagem);
        return mv;
    }
    
    // Criar as rotas de navegAção
    // SOBRE
    @GetMapping("/sobre")
    public String abrirSobre() {
        return "sobre";
    }
    // PRODUTOS
    @GetMapping("/produto")
    public String abrirProdutos() {
        return "produtos";
    }

    // CONTATO
    @GetMapping("/contato")
    public String abrirContato() {
        return "contato";
    }

    // Enviar formulário com o nome do usuário
    @PostMapping("/home")
    public ModelAndView postHome(@RequestParam ("nome") String nome) {
        ModelAndView mv = new ModelAndView("index");
        String mensagem = "Olá, " +nome;
        mv.addObject("msg", mensagem);
        mv.addObject("nome", "");
        return mv;
    }
    
}