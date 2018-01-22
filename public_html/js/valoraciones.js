//alert('hola');
var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('mainController', ["$scope", "$http", function ($scope, $http) {
        //alert($scope);        
        $scope.lista = [];
        $http.get('../controlador/controlador_mostrar_conductores.php').success(function (data) {
            $scope.lista = data;
        });
//////////////////////////////////////////////////////////////////////////////////////////////
        $scope.misdatos = {
            idusuario: "",
            imagen: "",
            nombre: "",
            apellidos: "",
            usuario: "",
            positivo: "",
            negativo: ""

        };

//    $scope.verAgregaralumno=false;
        $scope.VerMenu = true;
/////////////////////////////////////////////////////////////////////////////////////////////
        $scope.positivo = function (index, item) {
            $idUsu = item.idusuario;
            //alert($idUsu); 
             //Actualiza los votos positivos de la tabla
            item.positivo = parseInt(item.positivo)+1;       
            //mandar el id del conductor al controlador
            $http({url: '../controlador/controlador_enviar_valoraciones_positivas.php',
                method: "GET", //recoger el idusuario

                params: {value: $idUsu}
            }).success(function (response) {
                $scope.misdatos.idusuario = response[0].idusuario;
            });
            //alert('Su votacion ha sido enviada correctamente, gracias por colaborar :)');

        };

///////////////////////////////////////////////////////////////////////////////////////////////
        $scope.negativo = function (index, item) {
            $idUsu = item.idusuario;
            //alert($idUsu);
            //Actualiza los votos negativos de la tabla
            item.negativo = parseInt(item.negativo)+1;
            //mandar el id del conductor al controlador
            $http({url: '../controlador/controlador_enviar_valoraciones_negativas.php',
                method: "GET", //recoger el idtrayecto

                params: {value: $idUsu}
            }).success(function (response) {
                $scope.misdatos.idusuario = response[0].idusuario;
            });
            //alert('Su votacion ha sido enviada correctamente, gracias por colaborar :)');

        };  
/////////////////////////////////////////////////////////////////////////////////////////////     
//  //Se busca por cualquiera de los caract.Proemro (anti-emro) se da al boton 
//  //iniciar busqueda para ver los campos de busqueda y luego se filtra//
        $scope.VerFormBusqueda = false;
        $scope.Buscar = function () {
            $scope.VerFormBusqueda = true;
        };
////////////////////////////////////////////////////////////////////////////////////////////////
        $scope.finbuscar = function () {
            $scope.TEXTObusqueda = "";
            $scope.VerFormBusqueda = false;
        };

    }]);
