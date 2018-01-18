//alert('hola');
var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('mainController', ["$scope", "$http", function ($scope, $http) {
        alert($scope);        
        $scope.lista = [];
        $http.get('../controlador/controlador_mostrarConductoresValoraciones.php').success(function (data) {
            alert(data);       
            $scope.lista = data;
        });
//////////////////////////////////////////////////////////////////////////////////////////////
       $scope.misdatos = {
                nombre: "",
                apellidos: "",
                imagen: "",
                usuario: ""
//              positivo: "",
//              negativo: ""
                        
            };  
//    $scope.verAgregaralumno=false;
        $scope.VerMenu = true;
//////////////////////////////////////////////////////////////////////////////////////////////        
//  //Se busca por cualquiera de los caract.Proemro se da al boton 
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
