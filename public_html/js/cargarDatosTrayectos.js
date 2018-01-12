 alert('hola');
var miAplicacion = angular.module('miAplicacion',[]);
 alert('hola 2');
miAplicacion.controller('mainController',["$scope","$http",function($scope,$http){
    
    alert('holitaaaa');
    alert($scope);
    alert($http);
    $scope.lista=[];
    $http.get('../controlador/controlador_listar_trayectos.php').success(function(data){       
        alert(data);       
        $scope.lista = data;
     }); 
//////////////////////////////////////////////////////////////////////////////////////////////
$scope.misdatos={
       
        origen:"",
        destino:"",
        fecha_hora:"",
        plazas:"",
        
   };
            ///// Cargar la lista del JSON //////    
//    $http.get('../JSON/datos.json').then(function(response)    {
//       alert(response.data);
//        $scope.lista =response.data;
//        $scope.ultimoId =  $scope.lista[parseInt($scope.lista.length)-1].id;
//         $scope.misdatos.id = parseInt($scope.ultimoId)+1;        
//    }).catch (function(response) {
//            console.error("Error ocurred: ", response.status, response.data);
//        }).finally(function(){
//            console.log("Task Finished.");
//    });

//    
//
//    $scope.verAgregaralumno=false;
//    $scope.VerMenu=true;
//    ///////////////////matar a todo el mundo//////////////////////////////
//    ////////////////////////////////////////////////
//    $scope.Iniciaragregar=function(){
//        $scope.verAgregaralumno=true;
//        $scope.VerMenu=false;
//    };
//  
// //////////////////////////////////////////////////////////////////////////////////////////////
//$scope.agregar = function () {
//            $scope.lista.push({id: $scope.misdatos.id, nombre: $scope.misdatos.nombre,
//                apellido1: $scope.misdatos.apellido1, apellido2: $scope.misdatos.apellido2,
//                ciclo: $scope.misdatos.ciclo, curso: $scope.misdatos.curso});
//
//            //INSERTAR ALUMNO NUEVO EN BBDD
//            var nuevoAlumno=$scope.misdatos;
//            var enviarNuevoAlumno= JSON.stringify(nuevoAlumno);
//            //alert(enviarNuevoAlumno);
//            $http({url:'../controlador/insertar.php',
//                method:"GET",
//
//                params: {value:enviarNuevoAlumno}
//            }).success(function (data) {
//                $scope.misdatos.id++;
//                $scope.misdatos.nombre = '';
//                $scope.misdatos.apellido1 = '';
//                $scope.misdatos.apellido2 = '';
//                $scope.misdatos.ciclo = '';
//                $scope.misdatos.curso = '';
//                $scope.verAgregaralumno = false;
//                $scope.VerMenu = true;
//            });
//
//
//
//
//        };
//  
////////////////////////////////////////////////////////////////////////////////////////////////
//  $scope.cancelar = function() {
//    //alert($scope.misdatos.id);
//    $scope.misdatos.id = $scope.misdatos.id;
//    $scope.misdatos.nombre = '';
//    $scope.misdatos.apellido1='';
//    $scope.misdatos.apellido2='';
//    $scope.misdatos.ciclo='';
//    $scope.misdatos.curso='';
//    $scope.verAgregaralumno=false;
//    $scope.verEditarAlumno=false;
//    $scope.VerMenu=true;
//  };
//  
////////////////////////////////////////////////////////////////////////////////////////////////
//  $scope.Eliminarlista = function() {
//    $scope.lista = [];
//  };
//  
////////////////////////////////////////////////////////////////////////////////////////////////
//$scope.eliminar = function (row, id) {
//            if (confirm("¿seguro que desea eliminar?")) {
//                $scope.lista.splice(row, 1);
//                $scope.borrarAlumno = parseInt(id);
//                //alert($scope.borrarAlumno);
//                $http({url: "../controlador/eliminar.php",
//                    method: "GET",
//                    params: {value: $scope.borrarAlumno}
//                }).then(function (response) {
//                    //alert(response);
//                });
//            }
//        };
//  
//  //////////////////////////////////////////////////////////////////////////////////////////////
//  $scope.modificar = function(row,item) {
//      $scope.verEditarAlumno=true;  
//      //alert(id);
//     $scope.misdatos.id = item.id;
//     $scope.misdatos.nombre = item.nombre;
//     $scope.misdatos.apellido1 = item.apellido1;
//     $scope.misdatos.apellido2 = item.apellido2;
//     $scope.misdatos.ciclo = item.ciclo;
//     $scope.misdatos.curso = item.curso;
//  };
//  $scope.modificarAlumno=function(){
//        //actualizar lista 
//            for(i=0;i<$scope.lista.length;i++){
//                if($scope.lista[i].id==$scope.misdatos.id){
//                    $scope.lista[i].nombre = $scope.misdatos.nombre;
//                    $scope.lista[i].apellido1 = $scope.misdatos.apellido1;
//                    $scope.lista[i].apellido2 = $scope.misdatos.apellido2;
//                    $scope.lista[i].ciclo = $scope.misdatos.ciclo;
//                    $scope.lista[i].curso = $scope.misdatos.curso;
//                }
//            }
//      
//        //actualizar bbdd
//         var editarAlumno=$scope.misdatos;
//            var enviarAlumnoEditado= JSON.stringify(editarAlumno);
//            //alert(enviarNuevoAlumno);
//            $http({url:'../controlador/modificar.php',
//                method:"GET",
//
//                params: {value:enviarAlumnoEditado}
//            }).success(function (data) {
//                $scope.misdatos.id++;
//                $scope.misdatos.nombre = '';
//                $scope.misdatos.apellido1 = '';
//                $scope.misdatos.apellido2 = '';
//                $scope.misdatos.ciclo = '';
//                $scope.misdatos.curso = '';
//                $scope.verAgregaralumno = false;
//                $scope.verEditarAlumno=false;
//                $scope.VerMenu = true;
//            });
//  };
//  //Se busca por cualquiera de los caract.Proemro se da al boton 
//  //iniciar busqueda para ver los campos de busqueda y luego se filtra//
//  $scope.VerFormBusqueda=false;
//  $scope.Buscar = function() {
//    $scope.VerFormBusqueda=true;
//  };
////////////////////////////////////////////////////////////////////////////////////////////////
//  $scope.finbuscar = function() {
//    $scope.TEXTObusqueda="";
//    $scope.VerFormBusqueda=false;
//  };

}]);
