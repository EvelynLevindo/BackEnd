package br.senai.estoque.gerenciamento_estoque.Controller;

import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.GetMapping;

@RestController // Avisa que essa classe serve para assuntos web
public class PingController {

    @GetMapping("/ping") // Quando alguém acessar o endereço ping, o servidor vai executar essa função
    public String ping() {
        return "ok";
    }
}
