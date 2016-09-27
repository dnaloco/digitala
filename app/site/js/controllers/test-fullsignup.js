function TestFullsignupController(ngDialog, $scope, Upload, Restangular, $q, $http, CsrfFormService) {
    // injetando dependência
    'ngInject';
    // ViewModel
    const vm = this;

    //var signupForm = vm.signupForm;
    console.log('vm', vm);

    vm.imageDoctype = 'image collection';

    vm.getToken = function(formName, scope) {

        var tokenName = formName + 'Token';

        CsrfFormService.getCsrf(tokenName).then(function (csrfToken) {
          console.log('Form Name', formName);
          scope[tokenName] = csrfToken;
          scope.tokenName = tokenName;
          console.log('FORM TOKEN' , scope[tokenName]);
          $scope[formName][tokenName].$setValidity('required', true);
        });
    };

    vm.userTest = {
        "user": "arthur_scostapojjhhkjhlsdasa3@yahoo.com",
        "password": "artdna",
        "person": {
            "name": "Arthur S. Costa",
            "gender": "male",
            //"birthdate": "2000-08-01",
/*            "emails": [{
                "anwserable": "Arthur Costa",
                "address": "dnashghjilloco3@gmail.com"
            }],*/
            "addresses": [{
                "type": "residential",
                "city": {
                    "id": 521500,
                    "name": "NOVA VENEZA"
                },
                "address1": "Avenida Ministro Alvaro de Souza Lima",
                "address2": "Casa 21",
                "number": "599",
                "residentialArea": "Bairro dos Limões",
                "postalCode": "04664-020"
            }],
/*            "socialNetworks": [{
                "type": "facebook",
                "address": "https://www.facebook.com/arthyuihnmmbmur.scostasadasda.3"
            }, {
                "type": "twitter",
                "address": "https://twitter.com/ArbvnbvnmbmmnthuradsqweSantosadsCos3"
            }],*/
            "telephones": [{
                "type": "residential",
                "number": "55235634",
                "DDD": "11"
            }, {
                "type": "mobile",
                "number": "987676663",
                "answerable": "Terezinha (mãe)",
                "DDD": "11",
                "mobileOperator": "oi",
                "notes": "Ligar no período matutino até as 11h ou no perído noturno, após as 19h"
            }],
            "documents": [{
                "type": "rg",
                "field1": "322412146",
                "field2": "ssp"
            }, {
                "type": "cpf",
                "field1": 31335964894
            }]

        }
    };
    /*vm.user = {
        person: {
            documents: []
        }
    };*/


    vm.user = vm.userTest;

    vm.submit = function(form) {

        if (form.$invalid)
            throw new Error('Formulário inválido');

        var deferred = $q.defer()
        var queue = [];

        Restangular.one("preupload", 411).remove().then(function(resp) {
            if (vm.user.person) {
                if (vm.user.person.photo) {
                    var promise = vm.upload(vm.user.person.photo, {
                        type: 'image'
                    });
                    queue.push(promise);
                }

                /*if (vm.user.person.documents) {
                    angular.forEach(vm.user.person.documents, function (document) {
                        if (document.images) {
                            angular.forEach(document.images, function (file) {
                                var uploadResponse = vm.upload(file, {
                                    type: 'image'
                                });
                                queue.push(uploadResponse);
                            });
                        }
                    });
                }*/
            }


            $q.all(queue).then(
                function(data) {
                    // Criar o usuário
                    Restangular.all('users').post(vm.user).then(function(resp) {
                        console.log('USER', resp);
                    }, function(error) {
                        console.log('User ERROR', error);
                    });
                    console.log('Data', data);
                },
                function(err) {
                    console.log('Queue ERROR', err);
                }
            );
        }, function(error) {
            console.log('Preupload ERROR', error);
        });



        /*var base = Restangular.all('users');
        base.post(vm.user).then(function(response) {
            console.log('Restangular response', response);
        }, function errorCallback(error) {
            console.log("Oops error from server :(", error);
        });*/

        /*if (vm.user.person.documents.images !== null || vm.user.person.documents.images !== undefined) {
        files.person.documents.images = vm.user.person.documents.images;
      }

      if (vm.user.person.documents.files !== null || vm.user.person.documents.files !== undefined) {
        files.person.documents.files = vm.user.person.documents.files;
      }

      if (vm.user.company.logo !== null || vm.user.company.logo !== undefined) {
        files.company.logo = vm.user.company.logo;
      }

      if (vm.user.company.logo !== null || vm.user.company.logo !== undefined) {
        files.company.logo = vm.user.company.logo;
      }

      if (vm.user.company.documents.images !== null || vm.user.company.documents.images !== undefined) {
        files.company.documents.images = vm.user.company.documents.images;
      }

      if (vm.user.company.documents.files !== null || vm.user.company.documents.files !== undefined) {
        files.company.documents.files = vm.user.company.documents.files;
      }*/

        //vm.upload(vm.user.person.photo);
    };

    vm.upload = function(file, data) {
        vm.uploading = true;
/*
        var deferred = $q.defer();

        return Upload.upload({
            url: '/api/preupload',
            method: 'POST',
            data: {
                file: file,
                data: data
            }
        }).then(function(resp) {
            if (resp.data.success) {
                file.uploaded = resp.data.data;;
                return deferred.resolve(resp);
            } else {
                return deferred.reject(resp);
            }
        }, function(resp) {
            return deferred.reject(resp);
        }, function(evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            return deferred.notify('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
        });
*/
        return $q(function(resolve, reject) {
            Upload.upload({
                url: '/api/public/preupload',
                method: 'POST',
                data: {
                    file: file,
                    data: data
                }
            }).then(function(resp) {
                if (resp.data.success) {
                    file.uploaded = resp.data.data;;
                    return resolve(resp);
                } else {
                    return reject(resp);
                }
            }, function(resp) {
                return reject(resp);
            }, function(evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
            });
          });

    };
}
export
default {
    name: 'TestFullsignupController',
    fn: TestFullsignupController
};