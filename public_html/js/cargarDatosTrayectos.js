//alert('hola')

var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('mainController', ["$scope", "$http", function ($scope, $http) {
        //te jakié la computa     
        $scope.lista = [];
        $http.get('../controlador/controlador_buscarTrayectos.php').success(function (data) {
            //alert(data);       
            $scope.lista = data;
        });
//////////////////////////////////////////////////////////////////////////////////////////////
        $scope.misdatos = {
            idtrayecto: "",
            origen: "",
            destino: "",
            fecha_hora: "",
            plazas: "",
            paradas: ""
        };
        $scope.VerMenu = true;

// //////////////////////////////////////////////////////////////////////////////////////////////
        $scope.infor = function (index, item) {
            $miId = item.idusuario;
            //alert($miId);
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

                $scope.ventana_secundaria = window.open('prueba.html', 'about:blank', 'titlebar=yes,toolbar=yes,location=yes,status=no,menubar=yes,scrollbars=no,resizable=yes,width=345,Height=220,left=545,top=200');
                $scope.ventana_secundaria.document.write("<link rel='stylesheet' href='../css/popup.css'><table class='tablita'><tr><th class='perfil'>Perfil</th></tr><tr></tr><td><img src='" + $scope.misdatos1.imagen + "'width='100' height='100'></td>\n\
                <tr><th>Nombre</th><th>Apellidos</th><th>Usuario</th><th><img src='../img/thumbs-up.png'width='20' height='20'></th><th><img src='../img/thumbs-down.png'width='20' height='20'></th>\n\
                </tr><tr><td>" + $scope.misdatos1.nombre + "</td> <td>" + $scope.misdatos1.apellidos + "</td><td>" + $scope.misdatos1.usuario + "</td> <td>" + $scope.misdatos1.positivo + "</td> <td>" + $scope.misdatos1.negativo + "</td></tr></table>");
            });
        };
//////////////////////////////////////////////////////////////////////////////////////////////
        $scope.peticion = function (index, item) {
            //crear la variable de idtrayecto
            $idtray = item.idtrayecto;
            //alert($idtray);                            
            if (item.plazas == 0) {
                alert('Plazas agotadas, busque otro trayecto');
            } else {
                $http({url: '../controlador/controlador_mandar_peticiones.php',
                    method: "GET", //recoger el idtrayecto

                    params: {value: $idtray}
                }).success(function (response) {
                    $scope.misdatos.idtrayecto = response[0].idtrayecto;
                });
                alert('Su petición ha sido enviada correctamente, espere a que el conductor acepte su petición :)');
            }          
        };

//////////////////////////////////////////////////////////////////////////////////////////////        
//Se busca por cualquiera de los caract.Proemro se da al boton 
//iniciar busqueda para ver los campos de busqueda y luego se filtra
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
