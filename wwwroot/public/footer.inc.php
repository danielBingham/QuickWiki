    </div>
    <div id="footer">
        <div id="debug">
        <?php 
            if(SERVER_INSTANCE == 'dev') {
                QApplication::$Database[1]->OutputProfiling(); 
                QApplication::$Database[2]->OutputProfiling();
            } 
         ?>
        </div>
    </div>
</body>
</html>

