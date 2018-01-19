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
            idusuario:"",
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
    $scope.positivo = function (index,item) {
        $idUsu = item.idusuario;
        alert($idUsu);
    };
         
///////////////////////////////////////////////////////////////////////////////////////////////
    $scope.negativo = function (index,item) {
         $idUsu = item.idusuario;
        alert($idUsu);
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
