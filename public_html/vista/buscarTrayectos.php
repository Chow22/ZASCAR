<html lang="en" ng-app="miAplicacion">    
    <head>
        <meta charset="UTF-8">
        <title>Zascar</title>
    </head>         
        <body>        
            <br>
            <br>
        <legend>Filtra tu búsqueda: </legend>
        <br>
        <input type="text"> <input type="button" Value="Buscar">
        <br>
        <br>
        <div id="zonalista"> 
            <ul id="listaalumnos"> 
                <li ng-repeat="item in lista | filter:TEXTObusqueda"> 
                    <span class="medio"> {{item.origen}} </span> 
                    <span class="medio"> {{item.destino}} </span> 
                    <span class="grande"> {{item.paradas}}</span> 
                    <span class="grande"> {{item.fecha}} </span> 
                    <span class="peque"> {{item.plazas}} </span>                     
<!--                <span class="peque"> <input type="button" ng-model="item.seleccionado"></span> -->
                    <span class="peque">  <img src="../img/infobutton.png" class="txiki" style="cursor:pointer;" ng-click='informacion($index,item)' alt="" ></span>                      
                    <span class="peque">  <img src="../img/acceptbutton.png" class="txiki" style="cursor:pointer;" ng-click='aceptar($index,item.id)' alt="" ></span> 
                </li>
            </ul>            
        </div>        
<br>                
</form>
</body>
</html>