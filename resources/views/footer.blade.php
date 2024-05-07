
 <style>
#button {
  display: inline-block;
  background-color: #337BAE;
  width: 50px;
  height: 50px;
  text-align: center;
  border-radius: 60px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: background-color .3s, 
    opacity .5s, visibility .5s;
  opacity: 0;
  visibility: hidden;
  z-index: 1000;
}
#button::after {
  content: "\f077";
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  font-size: 20px;
  line-height: 50px;
  color: #fff;
  position: relative;
  top: -1px;
}
#button:hover {
  cursor: pointer;
  background-color: #333;
}
#button:active {
  background-color: #555;
}
#button.show {
  opacity: 1;
  visibility: visible;
}
@media (min-width: 500px) {
  .content {
    width: 20%;
  }
  #button {
    margin: 20px;
  }
}
}</style>
 <a id="button"></a>
 <!-- <h4 class="bannerfooter">Copyright 2021© NewGate. All right reserved.</h4> -->

