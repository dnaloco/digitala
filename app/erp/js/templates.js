angular.module("templates", []).run(["$templateCache", function($templateCache) {$templateCache.put("layout/footer.html","<div>\n	FOOTER\n</div>");
$templateCache.put("layout/header.html","<div class=\"top-bar\">\n  \n</div>");
$templateCache.put("layout/home.html","<div>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n	HOME DASHBOARD... <br>\n</div>");
$templateCache.put("layout/left-navbar.html","<div>\n    <md-sidemenu>\n        <md-sidemenu-group>\n            <md-subheader class=\"md-no-sticky\">\n                Menu\n            </md-subheader>\n            <md-sidemenu-content md-arrow=\"true\" md-heading=\"Meu Negócio\" md-icon=\"business\">\n                <md-sidemenu-button ui-sref=\"Home.MyBusiness.matrix\">\n                    <span class=\"icon-building\">\n                        &nbsp;&nbsp;&nbsp;Matriz\n                    </span>\n                </md-sidemenu-button>\n                <md-sidemenu-button ui-sref=\"Home.MyBusiness.subsidiaries\">\n                    <span class=\"icon-office2\">\n                        &nbsp;&nbsp;&nbsp;Filiais\n                    </span>\n                </md-sidemenu-button>\n            </md-sidemenu-content>\n\n            <md-sidemenu-content md-arrow=\"true\" md-heading=\"Financeiro\" md-icon=\"attach_money\">\n                <md-sidemenu-button ui-sref=\"Home.Financial.accounts\">\n                	<span class=\"icon-safe\">\n                        &nbsp;&nbsp;&nbsp;Contas\n                    </span>\n                </md-sidemenu-button>\n\n                <md-sidemenu-button ui-sref=\"Home.Financial.payments\">\n                	<span class=\"icon-wallet3\">\n                        &nbsp;&nbsp;&nbsp;Pagamentos\n                    </span>\n                </md-sidemenu-button>\n\n                <md-sidemenu-button ui-sref=\"Home.Financial.taxes\">\n                	<span class=\"icon-coins\">\n                        &nbsp;&nbsp;&nbsp;Impostos\n                    </span>\n                </md-sidemenu-button>\n            </md-sidemenu-content>\n\n            <md-sidemenu-content md-arrow=\"true\" md-heading=\"Recursos Humanos\" md-icon=\"face\">\n\n                <md-sidemenu-button ui-sref=\"Home.HumanResource.partners\">\n                    <span class=\"icon-people\">\n                        &nbsp;&nbsp;&nbsp;Colaboradores\n                    </span>\n                </md-sidemenu-button>\n\n                <md-sidemenu-button ui-sref=\"Home.HumanResource.monitoring\">\n                    <span class=\"icon-eye4\">\n                        &nbsp;&nbsp;&nbsp;Monitoramento\n                    </span>\n                </md-sidemenu-button>\n\n                <md-sidemenu-button ui-sref=\"Home.HumanResource.organization\">\n                    <span class=\"icon-tree\">\n                        &nbsp;&nbsp;&nbsp;Organização\n                    </span>\n                </md-sidemenu-button>\n\n                <md-sidemenu-button ui-sref=\"Home.HumanResource.recruitment\">\n                	<span class=\"icon-add-user\">\n                        &nbsp;&nbsp;&nbsp;Recrutamento\n                    </span>\n                </md-sidemenu-button>\n\n                <md-sidemenu-button ui-sref=\"Home.HumanResource.support\">\n                	<span class=\"icon-life-bouy2\">\n                        &nbsp;&nbsp;&nbsp;Suporte\n                    </span>\n                </md-sidemenu-button>\n\n                <md-sidemenu-button ui-sref=\"Home.HumanResource.wage\">\n                	<span class=\"icon-money-bag\">\n                        &nbsp;&nbsp;&nbsp;Salários & Benefícios\n                    </span>\n                </md-sidemenu-button>\n\n            </md-sidemenu-content>\n\n            <md-sidemenu-content md-arrow=\"true\" md-heading=\"Inventário\" md-icon=\"store\">\n                <md-sidemenu-button ui-sref=\"Home.Inventory.parkeds\">\n                    <span class=\"icon-local_parking\">\n                        &nbsp;&nbsp;&nbsp;Estacionados\n                    </span>\n                </md-sidemenu-button>\n                <md-sidemenu-button ui-sref=\"Home.Inventory.warehouses\">\n                    <span class=\"icon-shipping\">\n                        &nbsp;&nbsp;&nbsp;Armazens\n                    </span>\n                </md-sidemenu-button>\n                <md-sidemenu-button ui-sref=\"Home.Inventory.storages\">\n                    <span class=\"icon-store\">\n                        &nbsp;&nbsp;&nbsp;Estoques\n                    </span>\n                </md-sidemenu-button>\n            </md-sidemenu-content>\n\n            <md-sidemenu-content md-arrow=\"true\" md-heading=\"Ordens\" md-icon=\"assignment\">\n                <md-sidemenu-button ui-sref=\"Home.Orders.stores\">\n                    <span class=\"icon-cart-plus\">\n                        &nbsp;&nbsp;&nbsp;Produtos\n                    </span>\n                </md-sidemenu-button>\n                <md-sidemenu-button ui-sref=\"Home.Orders.expenses\">\n                    <span class=\"icon-bill\">\n                        &nbsp;&nbsp;&nbsp;Despesas\n                    </span>\n                </md-sidemenu-button>\n                <md-sidemenu-button ui-sref=\"Home.Orders.productions\">\n                    <span class=\"icon-industry\">\n                        &nbsp;&nbsp;&nbsp;Produções\n                    </span>\n                </md-sidemenu-button>\n                <md-sidemenu-button ui-sref=\"Home.Orders.sales\">\n                    <span class=\"icon-cart-arrow-down\">\n                        &nbsp;&nbsp;&nbsp;Vendas\n                    </span>\n                </md-sidemenu-button>\n                <md-sidemenu-button ui-sref=\"Home.Orders.rentals\">\n                    <span class=\"icon-send-o\">\n                        &nbsp;&nbsp;&nbsp;Aluguéis\n                    </span>\n                </md-sidemenu-button>\n                <md-sidemenu-button ui-sref=\"Home.Orders.services\">\n                    <span class=\"icon-room_service\">\n                        &nbsp;&nbsp;&nbsp;Serviços\n                    </span>\n                </md-sidemenu-button>\n            </md-sidemenu-content>\n\n            <md-sidemenu-content ui-sref=\"Home.manufacturers\" md-heading=\"Fabricantes\" md-icon=\"build\">\n            </md-sidemenu-content>\n\n            <md-sidemenu-content ui-sref=\"\" md-heading=\"Fornecedores\" md-icon=\"work\">\n            </md-sidemenu-content>\n\n            <md-sidemenu-content ui-sref=\"\" md-heading=\"Transportadoras\" md-icon=\"local_shipping\">\n            </md-sidemenu-content>\n\n            <md-sidemenu-content ui-sref=\"\" md-heading=\"Produtos\" md-icon=\"shopping_basket\">\n            </md-sidemenu-content>\n\n            <md-sidemenu-content ui-sref=\"\" md-heading=\"Promoções\" md-icon=\"local_offer\">\n            </md-sidemenu-content>\n\n            <md-sidemenu-content ui-sref=\"\" md-heading=\"Serviços\" md-icon=\"room_service\">\n            </md-sidemenu-content>\n\n            <md-sidemenu-content ui-sref=\"\" md-heading=\"Estatísticas\" md-icon=\"show_chart\">\n            </md-sidemenu-content>\n\n            <md-sidemenu-content ui-sref=\"\" md-heading=\"Relatórios\" md-icon=\"content_paste\">\n            </md-sidemenu-content>\n\n            <md-sidemenu-content ui-sref=\"\" md-heading=\"Configurações\" md-icon=\"settings\">\n            </md-sidemenu-content>\n        </md-sidemenu-group>\n    </md-sidemenu>\n\n\n</div>\n");
$templateCache.put("modals/modalTest.html","<h3>I\'m a modal from views!</h3>\n<ul>\n  <li ng-repeat=\"item in items track by $index\">\n    <a ng-click=\"selected.item = item\">{{ item }}</a>\n  </li>\n</ul>\n<p>Selected: <b>{{ selected.item }}</b></p>\n\n<button class=\"button\" ng-click=\"openNested()\">Open nested</button>\n<button class=\"button\" ng-click=\"ok()\">OK</button>\n<button ng-click=\"cancel()\" class=\"close-button\" aria-label=\"Close reveal\" type=\"button\">\n    <span aria-hidden=\"true\">&times;</span>\n</button>");
$templateCache.put("pages/login.html","<div>\n	<form id=\"da-login-form\" novalidate ng-submit=\"login.testLogin()\" name=\"signinForm\" ng-init=\"login.getToken(\'signinForm\', login.login)\">\n		<input type=\"hidden\" name=\"signinFormToken\" ng-model=\"silenceIsGold\" required>\n\n		<div ng-show=\"signinForm.signinFormToken.$invalid\">\n			Missing token form...\n		</div>\n			<table>\n				<caption>Login - Módulo ERP</caption>\n				<tr>\n					<td>\n						<label for=\"signin_user\">Usuário:</label>\n					</td>\n					<td>\n						<input type=\"email\" name=\"signin_user\" ng-model=\"login.login.user\" required>\n					</td>\n				</tr>\n				<tr>\n					<td><label for=\"signin_password\">Senha:</label></td>\n					<td><input type=\"password\" name=\"signin_password\" ng-model=\"login.login.password\" required></td>\n				</tr>\n				<tr>\n					<td colspan=\"2\">\n						<label for=\"rememberMe\" class=\"float-left\">Lembrar a minha senha?</label>\n						<input class=\"float-right\" type=\"checkbox\" name=\"signin_rememberMe\" id=\"rememberMe\">\n					</td>\n				</tr>\n				<tr>\n					<td colspan=\"2\">\n						<button class=\"button warning small expanded\" ng-disabled=\"signinForm.signin_user.$invalid\">Esqueci a senha</button>\n					</td>\n				</tr>\n				<tr>\n					<td colspan=\"2\">\n						<button class=\"button success expanded\" type=\"submit\" ng-disabled=\"signinForm.$invalid\">Login</button>\n					</td>\n				</tr>\n			</table>\n\n		</form>\n</div>\n");
$templateCache.put("forms/base/save-company-category.html","<div>\n	<!-- controller as compCateg -->\n	<form>\n		<label for=\"parent\">\n			Parente:\n			<select name=\"parent\" id=\"parent\">\n				\n			</select>\n		</label>\n		<label for=\"name\">\n			<input type=\"text\">\n		</label>\n	</form>\n</div>");
$templateCache.put("forms/base/save-company.html","<div>\n	<button>Categorias de Empresa</button>\n	<form></form>\n</div>");
$templateCache.put("forms/base/save-document.html","<div>\n	<form>\n		<label for=\"type\">\n			Tipo:\n			<select name=\"type\" id=\"type\">\n			</select>\n		</label>\n		<label for=\"number\">\n			Número:\n			<input type=\"text\">\n		</label>\n	</form>\n</div>");
$templateCache.put("forms/base/save-email.html","<div>\n	---\n</div>");
$templateCache.put("forms/base/save-good-tag.html","<div>\n	---\n</div>");
$templateCache.put("forms/base/save-person.html","<div>\n	---\n</div>");
$templateCache.put("forms/base/save-telephone.html","<div>\n	<form>\n		<label for=\"answerable\">\n			Tratar Com:\n			<input type=\"text\">\n		</label>\n		<label for=\"type\">\n			<select name=\"type\" id=\"type\">\n				\n			</select>\n		</label>\n		<label for=\"DDD\">\n			DDD:\n			<input type=\"text\">\n		</label>\n		<label for=\"number\">\n			Número:\n			<input type=\"text\">\n		</label>\n		<label for=\"notes\">\n			Notas:\n			<textarea name=\"notes\" id=\"notes\" cols=\"30\" rows=\"10\"></textarea>\n		</label>\n	</form>\n</div>");
$templateCache.put("forms/base/save-video.html","<div>\n	---\n</div>");
$templateCache.put("forms/financial/save-bank-account.html","<div>\n	<form>\n		<label for=\"name\">\n			Nome do Banco:\n			<input type=\"text\">\n		</label>\n		<label for=\"code\">\n			Código do Banco:\n			<input type=\"text\">\n		</label>\n		<label for=\"manager\">\n			Gerente:\n			<input type=\"text\">\n		</label>\n		<label for=\"ammount\">\n			Montante:\n			<input type=\"text\">\n		</label>\n		<label for=\"credit\">\n			Descrição:\n			<input type=\"text\">\n		</label>\n		<label for=\"agency\">\n			N.o Agência:\n			<input type=\"text\">\n		</label>\n		<label for=\"number\">\n			N.o Conta:\n			<input type=\"text\">\n		</label>\n		<label for=\"digit\">\n			Dígito Verificador:\n			<input type=\"text\">\n		</label>\n		<label for=\"ammount\">\n			Montante em conta corrent:\n			<input type=\"text\">\n		</label>\n		<label for=\"savingAmmount\">\n			Montante em poupança:\n			<input type=\"text\">\n		</label>\n\n	</form>\n\n</div>");
$templateCache.put("forms/financial/save-credit-account.html","<div>\n	---\n</div>");
$templateCache.put("forms/financial/save-money-account.html","<div>\n	---\n</div>");
$templateCache.put("forms/financial/save-payment.html","<div>\n	<form>\n		<label for=\"amountIncome\">\n			Valor Recebido:\n			<input type=\"text\">\n		</label>\n		<label for=\"amountOutcome\">\n			Valor Pago:\n			<input type=\"text\">\n		</label>\n		<label for=\"\"></label>\n	</form>\n</div>");
$templateCache.put("forms/financial/save-tax.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-benefit.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-burden.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-candidate.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-copartner.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-curriculum.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-department.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-employee.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-evaluation-rating.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-evaluation.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-occupation.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-partner.html","<div>\n	<form>\n		<label for=\"person\">\n			Pessoa:\n			<button>Selecionar</button>\n			<button>Criar</button>\n		</label>\n		<label for=\"occupation\">\n			Ocupação:\n			<select name=\"occupation\" id=\"occupation\">\n				\n			</select>\n		</label>\n		<label for=\"company\">\n			Empresa:\n		</label>\n		<label for=\"accounts\">\n			\n		</label>\n	</form>\n</div>");
$templateCache.put("forms/human-resource/save-salary.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-syndicate.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-time-punch-clock.html","<div>\n	---\n</div>");
$templateCache.put("forms/human-resource/save-training.html","<div>\n	---\n</div>");
$templateCache.put("forms/inventory/save-devolution.html","<div>\n	---\n</div>");
$templateCache.put("forms/inventory/save-discrepancy.html","<div>\n	---\n</div>");
$templateCache.put("forms/inventory/save-location.html","<div>\n	---\n</div>");
$templateCache.put("forms/inventory/save-place.html","<div>\n	---\n</div>");
$templateCache.put("forms/inventory/save-reservation.html","<div>\n	---\n</div>");
$templateCache.put("forms/inventory/save-storage.html","<div>\n	---\n</div>");
$templateCache.put("forms/inventory/save-warehouse.html","<div>\n	---\n</div>");
$templateCache.put("forms/manufacturer/save-manufacturer.html","<div>\n	<!-- controller as manuf -->\n	{{manuf.pageTitle}}\n	<form>\n		<button>Selecionar Empresa Existente</button>\n		<button>Cadastrar Nova Empresa</button>\n	</form>\n</div>");
$templateCache.put("forms/my-business/save-matrix.html","<div>\n	<form>\n		<label for=\"tradingName\">\n			Nome Fantasia:\n			<input type=\"text\">\n		</label>\n		<label for=\"companyName\">\n			Razão Social:\n			<input type=\"text\">\n		</label>\n		<label for=\"category\">\n			<select name=\"category\" id=\"category\"></select>\n		</label>\n		<label for=\"website\">\n			Website:\n			<input type=\"text\">\n		</label>\n\n		<fieldset>\n			<legend>Telefones:</legend>\n			<button>Adicionar novo telefone</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Documentos:</legend>\n			<button>Adicionar novo documento</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Emails:</legend>\n			<button>Adicionar novo email</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Telefones:</legend>\n			<button>Adicionar novo telefone</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Contatos:</legend>\n			<button>Selecionar pessoa p/ contato</button>\n			<button>Adicionar nova pessoa p/ contato</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Endereço:</legend>\n			<label for=\"postalCode\">\n				CEP:\n				<input type=\"text\">\n			</label>\n			<label for=\"state\">\n				Estado:\n				<select name=\"state\" id=\"state\"></select>\n			</label>\n			<label for=\"city\">\n				Cidade:\n			</label>\n			<label for=\"address1\">\n				Logradouro:\n				<input type=\"text\">\n			</label>\n			<label for=\"number\">\n				Número:\n				<input type=\"text\">\n			</label>\n			<label for=\"address2\">\n				Complemento:\n				<input type=\"text\">\n			</label>\n			<label for=\"residentialArea\">\n				Bairro:\n				<input type=\"text\">\n			</label>\n		</fieldset>\n\n		<label for=\"description\">\n			Descrição:\n			<textarea name=\"description\" id=\"description\" cols=\"30\" rows=\"10\"></textarea>\n		</label>\n		<label for=\"logo\">\n			Logo:\n		</label>\n		<label for=\"goodTags\">\n			Recursos & Serviços:\n			<button>Selecionarr</button>\n			<button>Criar Novo</button>\n		</label>\n		<label for=\"notes\">\n			Observações:\n			<textarea name=\"notes\" id=\"notes\" cols=\"30\" rows=\"10\"></textarea>\n		</label>\n	</form>\n</div>");
$templateCache.put("forms/my-business/save-subsidiary.html","<div>\n	<form>\n		<label for=\"tradingName\">\n			Nome Fantasia:\n			<input type=\"text\">\n		</label>\n		<label for=\"companyName\">\n			Razão Social:\n			<input type=\"text\">\n		</label>\n		<label for=\"category\">\n			<select name=\"category\" id=\"category\"></select>\n		</label>\n		<label for=\"website\">\n			Website:\n			<input type=\"text\">\n		</label>\n\n		<fieldset>\n			<legend>Telefones:</legend>\n			<button>Adicionar novo telefone</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Documentos:</legend>\n			<button>Adicionar novo documento</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Emails:</legend>\n			<button>Adicionar novo email</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Telefones:</legend>\n			<button>Adicionar novo telefone</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Contatos:</legend>\n			<button>Selecionar pessoa p/ contato</button>\n			<button>Adicionar nova pessoa p/ contato</button>\n		</fieldset>\n\n		<fieldset>\n			<legend>Endereço:</legend>\n			<label for=\"postalCode\">\n				CEP:\n				<input type=\"text\">\n			</label>\n			<label for=\"state\">\n				Estado:\n				<select name=\"state\" id=\"state\"></select>\n			</label>\n			<label for=\"city\">\n				Cidade:\n			</label>\n			<label for=\"address1\">\n				Logradouro:\n				<input type=\"text\">\n			</label>\n			<label for=\"number\">\n				Número:\n				<input type=\"text\">\n			</label>\n			<label for=\"address2\">\n				Complemento:\n				<input type=\"text\">\n			</label>\n			<label for=\"residentialArea\">\n				Bairro:\n				<input type=\"text\">\n			</label>\n		</fieldset>\n\n		<label for=\"description\">\n			Descrição:\n			<textarea name=\"description\" id=\"description\" cols=\"30\" rows=\"10\"></textarea>\n		</label>\n		<label for=\"logo\">\n			Logo:\n		</label>\n		<label for=\"goodTags\">\n			Recursos & Serviços:\n			<button>Selecionarr</button>\n			<button>Criar Novo</button>\n		</label>\n		<label for=\"notes\">\n			Observações:\n			<textarea name=\"notes\" id=\"notes\" cols=\"30\" rows=\"10\"></textarea>\n		</label>\n	</form>\n</div>");
$templateCache.put("forms/products/save-category.html","<div>\n	---\n</div>");
$templateCache.put("forms/products/save-department.html","<div>\n	---\n</div>");
$templateCache.put("forms/products/save-feature.html","<div>\n	---\n</div>");
$templateCache.put("forms/products/save-group.html","<div>\n	---\n</div>");
$templateCache.put("forms/products/save-manufacturer.html","<div>\n	---\n</div>");
$templateCache.put("forms/products/save-product.html","<div>\n	<h2>Novo Produto</h2>\n	<a ui-sref=\"Produtos\">Cancelar</a>\n	<form novalidate>\n		<label for=\"title\">\n			Título:\n			<input type=\"text\" name=\"title\" ng-model=\"prod.produto.title\">\n		</label>\n		<label for=\"subtitle\">\n			Subtítulo:\n			<input type=\"text\" name=\"subtitle\" ng-model=\"prod.produto.subtitle\">\n		</label>\n		<label for=\"manufacturer\">\n			Fabricante:\n			<select name=\"\" id=\"\">\n				\n			</select>\n			<button>Adicionar</button>\n		</label>\n		<label for=\"seoDescription\">\n			Descrição SEO:\n			<textarea name=\"\" id=\"\" cols=\"30\" rows=\"10\"></textarea>\n		</label>\n		<label for=\"description\">\n			Descrição:\n			<textarea name=\"\" id=\"\" cols=\"30\" rows=\"10\"></textarea>\n		</label>\n		<label for=\"briefDescription\">\n			Resumo:\n			<textarea name=\"\" id=\"\" cols=\"30\" rows=\"10\"></textarea>\n		</label>\n		<label for=\"department\">\n			Departamento:\n			<select name=\"\" id=\"\">\n				<option value=\"\"></option>\n			</select>\n		</label>\n		<label for=\"category\">\n			Categoria:\n			<select name=\"\" id=\"\">\n				<option value=\"\"></option>\n			</select>\n		</label>\n		<label for=\"features\">\n			Características:\n			<table>\n				\n			</table>\n		</label>\n		<label for=\"images\">\n			Fotos:\n		</label>\n		<label for=\"videos\">\n			Videos:\n		</label>\n		<label for=\"unitType\">\n			Tipo de Unidade:\n			<select name=\"\" id=\"\">\n				<option value=\"\"></option>\n			</select>\n		</label>\n		<label for=\"packageType\">\n			Tipo de Embalagem:\n			<select name=\"\" id=\"\">\n				<option value=\"\"></option>\n			</select>\n		</label>\n		<label for=\"weight\">\n			Peso:\n			<input type=\"number\" name=\"\" id=\"\">\n		</label>\n		<label for=\"dimensionLength\">\n			Largura:\n			<input type=\"number\" name=\"\" id=\"\">\n		</label>\n		<label for=\"dimensionHeight\">\n			Altura:\n			<input type=\"number\" name=\"\" id=\"\">\n		</label>\n		<label for=\"dimensionWidth\">\n			Comprimento:\n			<input type=\"number\" name=\"\" id=\"\">\n		</label>\n		<label for=\"alternativeProducts\">\n			Produtos Alternativos:\n		</label>\n		<label for=\"isHighlighted\">\n			Em Destaque?\n		</label>\n		<label for=\"isHighlighted\">\n			Em Lançamento?\n		</label>\n\n	</form>\n</div>");
$templateCache.put("forms/products/save-rating.html","<div>\n	---\n</div>");
$templateCache.put("forms/promotion/save-coupon.html","<div>\n	---\n</div>");
$templateCache.put("forms/promotion/save-market-promotion.html","<div>\n	---\n</div>");
$templateCache.put("forms/promotion/save-store-promotion.html","<div>\n	---\n</div>");
$templateCache.put("forms/service/save-service.html","<div>\n	---\n</div>");
$templateCache.put("forms/shipper/save-shipper.html","<div>\n	---\n</div>");
$templateCache.put("forms/shipper/save-timely-rating.html","<div>\n	---\n</div>");
$templateCache.put("forms/supplier/save-budget.html","<div>\n	---\n</div>");
$templateCache.put("forms/supplier/save-product-budget.html","<div>\n	---\n</div>");
$templateCache.put("forms/supplier/save-quality-rating.html","<div>\n	---\n</div>");
$templateCache.put("forms/supplier/save-supplier.html","<div>\n	---\n</div>");
$templateCache.put("pages/financial/accounts.html","<div>\n	Contas...\n</div>");
$templateCache.put("pages/financial/payments.html","<div>\n	Pagamentos...\n</div>");
$templateCache.put("pages/financial/taxes.html","<div>\n	Impostos...\n</div>");
$templateCache.put("pages/human-resource/monitoring.html","<div>\n	Monitoramento...\n</div>");
$templateCache.put("pages/human-resource/organization.html","<div>\n	Organização...\n</div>");
$templateCache.put("pages/human-resource/partners.html","<div>\n	Colaboradores...\n</div>");
$templateCache.put("pages/human-resource/recruitment.html","<div>\n	Recrutamento...\n</div>");
$templateCache.put("pages/human-resource/support.html","<div>\n	Suporte...\n</div>");
$templateCache.put("pages/human-resource/wage.html","<div>\n	Salários e Benefícios...\n</div>");
$templateCache.put("pages/inventory/parkeds.html","<div>\n	Estacionados...\n</div>");
$templateCache.put("pages/inventory/storages.html","<div>\n	Estoques...\n</div>");
$templateCache.put("pages/inventory/warehouses.html","<div>\n	Armazens...\n</div>");
$templateCache.put("pages/manufacturer/manufacturers.html","<div>\n	Fabricantes...\n</div>");
$templateCache.put("pages/my-business/matrix.html","<div>\n	Matriz...\n</div>");
$templateCache.put("pages/my-business/subsidiaries.html","<div>\n	Filiais...\n</div>");
$templateCache.put("pages/orders/expenses.html","<div>\n	Despesas...\n</div>");
$templateCache.put("pages/orders/productions.html","<div>\n	Produções...\n</div>");
$templateCache.put("pages/orders/rentals.html","<div>\n	Aluguéis...\n</div>");
$templateCache.put("pages/orders/sales.html","<div>\n	Vendas...\n</div>");
$templateCache.put("pages/orders/services.html","<div>\n	Serviços...\n</div>");
$templateCache.put("pages/orders/stores.html","<div>\n	Produtos...\n</div>");
$templateCache.put("pages/promotion/promotions.html","");
$templateCache.put("pages/reports/reports.html","");
$templateCache.put("pages/service/services.html","");
$templateCache.put("pages/settings/settings.html","");
$templateCache.put("pages/shipper/shippers.html","<div>\n	Transportadoras...\n</div>");
$templateCache.put("pages/statistics/statistics.html","");
$templateCache.put("pages/supplier/suppliers.html","<div>\n	Fornecedores...\n</div>");
$templateCache.put("forms/order/expense/save-expense-category.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/expense/save-expense.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/expense/save-order.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/production/save-order.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/production/save-process.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/production/save-product-process.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/production/save-production.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/production/save-raw-material.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/rental/save-order.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/rental/save-rental.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/sale/save-order.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/sale/save-sale.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/service/save-order.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/service/save-service.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/store/save-order.html","<div>\n	---\n</div>");
$templateCache.put("forms/order/store/save-store.html","<div>\n	---\n</div>");}]);