# Customjs
![Sample](https://github.com/Alexander-Pop/MageCode/blob/master/docs/Customjs.png "Customjs page screenshot")  
Shows how use RequireJS and Knockout.js (bindings) in Magento 2  
Result in console: yourDomain/index.php/customjs/test  
Frontend: yourDomain/index.php/customjs/test/simple

#### How can JavaScript on a page be configured using block arguments in layout XML?  
![Sample](https://github.com/Alexander-Pop/MageCode/blob/master/docs/CustomJsFromLayout.png "Customjs page screenshot")  
##### Result in console and frontend:  
yourDomain/index.php/customjs/test/layout  

##### Files:  
Codelegacy\Customjs\Block\Test\FromLayout.php  
Codelegacy\Customjs\view\frontend\layout\customjs_test_layout.xml  
Codelegacy\Customjs\view\frontend\templates\testlayout.phtml  
Codelegacy\Customjs\view\frontend\web\js\from_layout_example.js  

#### How to add js by layout and head section? (not good practice)  

##### Files:  
Codelegacy\Customjs\view\frontend\layout\customjs_test_index.xml  
Codelegacy\Customjs\view\frontend\web\js\hello_world.js  

License
----
MIT
