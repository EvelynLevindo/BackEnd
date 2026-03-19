package br.senai.estoque.gerenciamento_estoque.Controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import br.senai.estoque.gerenciamento_estoque.Service.FuncionarioService;
import org.springframework.ui.Model;
import jakarta.servlet.http.HttpSession;



@Controller
public class AuthController {

    @Autowired
    private FuncionarioService funcionarioService;
    
    @GetMapping("/login")
    public String loginPage() {
        return "auth/login";
    }
    
    @PostMapping("/login")
    public String login(@RequestParam String nif, @RequestParam String senha, HttpSession session, Model model) {
        
        boolean credenciaisOk=funcionarioService.validarLogin(nif, senha);

        if(!credenciaisOk){
            model.addAttribute("erro", "NIF ou Senha Inválidos!");
            return "auth/login";
        }

        session.setAttribute("usuarioLogado", true);
        session.setAttribute("nif", nif);

        return "redirect:/app";
    }
   
    @GetMapping("/cadastro")
    public String cadastroPage() {
        return "auth/cadastro";
    }
    
    @PostMapping("cadastro")
    public String cadastro(@RequestParam String nome, @RequestParam String nif, @RequestParam String senha, Model model) {
        boolean sucesso = funcionarioService.cadastrar(nif, nome, senha);

        if (sucesso) {
            model.addAttribute("sucesso", "Cadastro Realizado com Sucesso!");
            return "redirect:/login";
        }else{
            model.addAttribute("erro", "NIF Não Encontrado ou Já Ativo");
            return "auth/cadastro";
        }
    }
   
   @GetMapping("/logout")
	public String logout(HttpSession session) {
		session.invalidate();
		return "redirect:/login";
	}
}
