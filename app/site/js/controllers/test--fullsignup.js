function TestFullsignupController(ngDialog, $scope, Upload, Restangular, $q, $http) {
    // injetando dependência
    'ngInject';
    // ViewModel
    const vm = this;

    var signupForm = $scope.signupForm;

    vm.imageDoctype = 'image collection';

    vm.user = {
        person: {
            documents: []
        }
    };

    vm.submit = function() {
        var deferred = $q.defer()
        var queue = [];

        Restangular.one("preupload", 411).remove().then(function (resp){
            if (vm.user.person) {
                if (vm.user.person.photo) {
                    var uploadResponse = vm.upload(vm.user.person.photo, {
                        type: 'image'
                    });
                    queue.push(uploadResponse);
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
              function (data) {
                // Criar o usuário
                Restangular.all('users').post(vm.user).then(function (resp) {
                    console.log(resp);
                }, function (error) {
                    console.log('ERROR', error);
                });
                console.log('USER', vm.user);
              },
              function (err) {
                console.log('ERROR', err);
              }
            );
        }, function (error) {
            console.log('ERRO', error);
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
            } else {
                console.log('ERROR', resp);
            }
        }, function(resp) {
            console.log('Error status: ', resp);
        }, function(evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
        });
    };
}
export
default {
    name: 'TestFullsignupController',
    fn: TestFullsignupController
};