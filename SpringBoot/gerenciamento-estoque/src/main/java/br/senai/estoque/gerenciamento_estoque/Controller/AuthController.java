package br.senai.estoque.gerenciamento_estoque.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

import org.springframework.ui.Model;
import jakarta.servlet.http.HttpSession;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;



@Controller
public class AuthController {
    @GetMapping("/login")
    public String loginPage() {
        return "auth/login";
    }
    
    @PostMapping("/login")
    public String login(@RequestBody String nif, @RequestParam String senha, HttpSession session, Model model) {
        boolean credenciaisOk = false;

		if (!credenciaisOk) {
			model.addAttribute("erro", "NIF ou senha inválidos.");
			return "auth/login";
		}
		session.setAttribute("usuarioLogado", true);
		session.setAttribute("nif", nif);
		return "redirect:/app";
    }
    @GetMapping("/cadastro")
	public String cadastroPage() {
		return "auth/cadastro"; // templates/auth/cadastro.html
	}

	@PostMapping("/cadastro")
	public String cadastro(@RequestParam String nome, @RequestParam String nif, @RequestParam String senha, Model model) {
		model.addAttribute("erro", "Implementar cadastro no Service.");
		return "auth/cadastro";
	}

	@GetMapping("/logout")
	public String logout(HttpSession session) {
		session.invalidate();
		return "redirect:/";
	}
}
