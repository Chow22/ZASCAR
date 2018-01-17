//alert('hola');
var miAplicacion = angular.module('miAplicacion', []);
//alert('hola 2');
miAplicacion.controller('mainController', ["$scope", "$http", function ($scope, $http) {
        //te jakié la computadora
        //alert('holitaaaa');
        //alert($scope);
        //alert($http);
        $scope.lista = [];
        $http.get('../controlador/controlador_buscarTrayectos.php').success(function (data) {
            //alert(data);       
            $scope.lista = data;
        });
//////////////////////////////////////////////////////////////////////////////////////////////
        $scope.misdatos = {
            origen: "",
            destino: "",
            fecha_hora: "",
            plazas: "",
            paradas: ""
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
        $scope.VerMenu = true;
//    ///////////////////matar a todo el mundo//////////////////////////////
//    ////////////////////////////////////////////////
//    $scope.Iniciaragregar=function(){
//        $scope.verAgregaralumno=true;
//        $scope.VerMenu=false;
//    };
//  
// //////////////////////////////////////////////////////////////////////////////////////////////
        $scope.infor = function (index, item) {
            //$scope.lista = [];
            //alert(item.idusuario);
            $miId = item.idusuario;
            //var mostrarConductor = $scope.item;
            //var mostrarConductores = JSON.stringify(mostrarConductor);
            
            //alert(mostrarConductores);
            $scope.misdatos1 = {
                nombre: "",
                apellidos: "",
                imagen: "",
                usuario: "",
                positivo: "",
                negativo: ""
                        
            };            
            $http({url: '../controlador/controlador_mostrarConductores_trayectos.php',
                method: "GET",
                
                params: {value: $miId}
            }).success(function (response) {
                //datos = angular.fromJson(data);
                //datos = json_encode(data);
                //alert(datos);                                              
                //alert($scope.misdatos1[0].nombre);
                 $scope.misdatos1.imagen = response[0].imagen;
                $scope.misdatos1.nombre = response[0].nombre;
                $scope.misdatos1.apellidos = response[0].apellidos;                
                $scope.misdatos1.usuario = response[0].usuario;
                $scope.misdatos1.positivo = response[0].positivo;
                $scope.misdatos1.negativo = response[0].negativo;
                
                //alert( $scope.misdatos1.nombre +  $scope.misdatos1.apellidos + $scope.misdatos1.usuario +  $scope.misdatos1.positivo + $scope.misdatos1.negativo);
                $scope.ventana_secundaria = window.open('prueba.html','about:blank','titlebar=yes,toolbar=yes,location=yes,status=no,menubar=yes,scrollbars=yes,resizable=yes,width=500,Height=350,left=400,top=200');
                $scope.ventana_secundaria.document.write("<link rel='stylesheet' href='../css/popup.css'><table class='tablita'><tr><th class='perfil'>Perfil</th></tr><tr></tr><td><img src='" + $scope.misdatos1.imagen + "'width='100' height='100'></td>\n\
                <tr><th>Nombre</th><th>Apellidos</th><th>Usuario</th><th><img src='../img/thumbs-up.png'width='20' height='20'></th><th><img src='../img/thumbs-down.png'width='20' height='20'></th>\n\
                </tr><tr><td>" + $scope.misdatos1.nombre + "</td> <td>"+  $scope.misdatos1.apellidos +"</td><td>"+  $scope.misdatos1.usuario +"</td> <td>"+  $scope.misdatos1.positivo +"</td> <td>"+  $scope.misdatos1.negativo +"</td></tr></table>");
                //$scope.verAgregaralumno = false;
                //$scope.VerMenu = true;
            });
            
            
        };
//////////////////////////////////////////////////////////////////////////////////////////////
$scope.peti = function($index,item){
    
};
       
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
