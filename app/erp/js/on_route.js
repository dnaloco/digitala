function OnRoute(
  $stateProvider
  ) {

  'ngInject';
  
  $stateProvider
  .state('Home', {
    url: '/',
    views: {
/*      'header': {
        templateUrl: 'layout/header.html',
        controller: 'HeaderController as header'
      },*/
      'leftsidebar': {
        templateUrl: 'layout/left-navbar.html',
        controller: 'NavbarController as navbar'
      },
      'middlecontent': {
        templateUrl: 'layout/home.html',
        controller: 'HomeController as home'
      },
      'footer':{
        templateUrl: 'layout/footer.html',
        controller: 'FooterController as footer'
      }
    },
    title: 'Home'
  })
  .state('Login', {
    url: '/login',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/login.html',
            controller: 'LoginController as login',
        }
    },
    title: 'Login'
  })
  .state('Home.MyBusiness', {
    abstract: true,
    url: 'meu-negocio',
    template: '',
    title: 'Meu Negócio',
    ncyBreadcrumb: {
      label: 'Meu Negócio'
    }
  })
  .state('Home.MyBusiness.matrix', {
    url: '/matriz',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/my-business/matrix.html',
            controller: 'MatrixController as matrix',
        },
    },
    title: 'Matriz',
    ncyBreadcrumb: {
      label: 'Matriz'
    }
  })
  .state('Home.MyBusiness.subsidiaries', {
    url: '/filiais',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/my-business/subsidiaries.html',
            controller: 'SubsidiariesController as subsid',
        },
    },
    title: 'Filiais',
    ncyBreadcrumb: {
      label: 'Filiais'
    }
  })
  .state('Home.Financial', {
    abstract: true,
    url: 'financeiro',
    template: '',
    title: 'Financeiro',
    ncyBreadcrumb: {
      label: 'Financeiro'
    }
  })
  .state('Home.Financial.accounts', {
    url: '/contas',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/financial/accounts.html',
            controller: 'AccountsController as accounts',
        },
    },
    title: 'Contas',
    ncyBreadcrumb: {
      label: 'Contas'
    }
  })
  .state('Home.Financial.payments', {
    url: '/pagamentos',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/financial/payments.html',
            controller: 'PaymentsController as payments',
        },
    },
    title: 'Pagamentos',
    ncyBreadcrumb: {
      label: 'Pagamentos'
    }
  })
  .state('Home.Financial.taxes', {
    url: '/impostos',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/financial/taxes.html',
            controller: 'TaxesController as taxes',
        },
    },
    title: 'Impostos',
    ncyBreadcrumb: {
      label: 'Impostos'
    }
  })
  .state('Home.HumanResource', {
    abstract: true,
    url: 'recursos-humanos',
    template: '',
    title: 'Recursos Humanos',
    ncyBreadcrumb: {
      label: 'Recursos Humanos'
    }
  })
  .state('Home.HumanResource.monitoring', {
    url: '/monitoramento',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/human-resource/monitoring.html',
            controller: 'MonitoringController as monit',
        },
    },
    title: 'Monitoramento',
    ncyBreadcrumb: {
      label: 'Monitoramento'
    }
  })
  .state('Home.HumanResource.organization', {
    url: '/organizacao',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/human-resource/organization.html',
            controller: 'OrganizationController as organiz',
        },
    },
    title: 'Organização',
    ncyBreadcrumb: {
      label: 'Organização'
    }
  })
  .state('Home.HumanResource.partners', {
    url: '/colaboradores',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/human-resource/partners.html',
            controller: 'PartnersController as partners',
        },
    },
    title: 'Colaboradores',
    ncyBreadcrumb: {
      label: 'Colaboradores'
    }
  })
  .state('Home.HumanResource.recruitment', {
    url: '/recrutamento',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/human-resource/recruitment.html',
            controller: 'RecruitmentController as recruit',
        },
    },
    title: 'Recrutamento',
    ncyBreadcrumb: {
      label: 'Recrutamento'
    }
  })
  .state('Home.HumanResource.support', {
    url: '/suporte',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/human-resource/support.html',
            controller: 'SupportController as support',
        },
    },
    title: 'Suporte',
    ncyBreadcrumb: {
      label: 'Suporte'
    }
  })
  .state('Home.HumanResource.wage', {
    url: '/remuneracao',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/human-resource/wage.html',
            controller: 'WageController as wage',
        },
    },
    title: 'Remuneração',
    ncyBreadcrumb: {
      label: 'Remuneração'
    }
  })
  .state('Home.Inventory', {
    abstract: true,
    url: 'inventario',
    template: '',
    title: 'Inventário',
    ncyBreadcrumb: {
      label: 'Inventário'
    }
  })
  .state('Home.Inventory.parkeds', {
    url: '/estacionados',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/inventory/parkeds.html',
            controller: 'InventoryController as inven',
        },
    },
    title: 'Estacionados',
    ncyBreadcrumb: {
      label: 'Estacionados'
    }
  })
  .state('Home.Inventory.warehouses', {
    url: '/armazens',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/inventory/warehouses.html',
            controller: 'WarehousesController as ware',
        },
    },
    title: 'Armazens',
    ncyBreadcrumb: {
      label: 'Armazens'
    }
  })
  .state('Home.Inventory.storages', {
    url: '/estoques',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/inventory/storages.html',
            controller: 'StoragesController as storag',
        },
    },
    title: 'Estoques',
    ncyBreadcrumb: {
      label: 'Estoques'
    }
  })
  .state('Home.Orders', {
    abstract: true,
    url: 'ordens',
    template: '',
    title: 'Ordens',
    ncyBreadcrumb: {
      label: 'Ordens'
    }
  })
  .state('Home.Orders.expenses', {
    url: '/despesas',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/orders/expenses.html',
            controller: 'ExpensesController as expen',
        },
    },
    title: 'Despesas',
    ncyBreadcrumb: {
      label: 'Despesas'
    }
  })
  .state('Home.Orders.productions', {
    url: '/producoes',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/orders/productions.html',
            controller: 'ProductionsController as product',
        },
    },
    title: 'Produções',
    ncyBreadcrumb: {
      label: 'Produções'
    }
  })
  .state('Home.Orders.rentals', {
    url: '/alugueis',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/orders/rentals.html',
            controller: 'RentalsController as rent',
        },
    },
    title: 'Aluguéis',
    ncyBreadcrumb: {
      label: 'Aluguéis'
    }
  })
  .state('Home.Orders.sales', {
    url: '/vendas',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/orders/sales.html',
            controller: 'SalesController as sales',
        },
    },
    title: 'Vendas',
    ncyBreadcrumb: {
      label: 'Vendas'
    }
  })
  .state('Home.Orders.services', {
    url: '/servicos',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/orders/services.html',
            controller: 'ServicesController as servic',
        },
    },
    title: 'Serviços',
    ncyBreadcrumb: {
      label: 'Serviços'
    }
  })
  .state('Home.Orders.stores', {
    url: '/produtos',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/orders/stores.html',
            controller: 'StoresController as stores',
        },
    },
    title: 'Produtos',
    ncyBreadcrumb: {
      label: 'Produtos'
    }
  })
  .state('Home.manufacturers', {
    url: 'fabricantes',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/manufacturer/manufacturers.html',
            controller: 'ManufacturersController as manuf',
        },
    },
    title: 'Fabricantes',
    ncyBreadcrumb: {
      label: 'Fabricantes'
    }
  })
  .state('Home.suppliers', {
    url: 'fornecedores',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/supplier/suppliers.html',
            controller: 'SuppliersController as suppl',
        },
    },
    title: 'Fornecedores',
    ncyBreadcrumb: {
      label: 'Fornecedores'
    }
  })
  .state('Home.shippers', {
    url: 'transportadoras',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/shipper/shippers.html',
            controller: 'ShippersController as shipp',
        },
    },
    title: 'Transportadoras',
    ncyBreadcrumb: {
      label: 'Transportadoras'
    }
  })
  .state('Home.products', {
    url: 'produtos',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/product/products.html',
            controller: 'ProductsController as prod',
        },
    },
    title: 'Produtos',
    ncyBreadcrumb: {
      label: 'Produtos'
    }
  })
  .state('Home.promotions', {
    url: 'promocoes',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/promotion/promotions.html',
            controller: 'PromotionsController as prom',
        },
    },
    title: 'Promoções',
    ncyBreadcrumb: {
      label: 'Promoções'
    }
  })
  .state('Home.services', {
    url: 'servicos',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/service/services.html',
            controller: 'ServicesController as serv',
        },
    },
    title: 'Serviços',
    ncyBreadcrumb: {
      label: 'Serviços'
    }
  })
  .state('Home.statistics', {
    url: 'estatisticas',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/statistics/statistics.html',
            controller: 'StatisticsController as stat',
        },
    },
    title: 'Estatísticas',
    ncyBreadcrumb: {
      label: 'Estatísticas'
    }
  })
  .state('Home.reports', {
    url: 'relatorios',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/reports/reports.html',
            controller: 'ReportsController as rep',
        },
    },
    title: 'Relatórios',
    ncyBreadcrumb: {
      label: 'Relatórios'
    }
  })
  .state('Home.settings', {
    url: 'configuracoes',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/settings/settings.html',
            controller: 'settingsController as sett',
        },
    },
    title: 'Configurações',
    ncyBreadcrumb: {
      label: 'Configurações'
    }
  });

}

export default OnRoute;