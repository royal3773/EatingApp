/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/usertop.js":
/*!*********************************!*\
  !*** ./resources/js/usertop.js ***!
  \*********************************/
/***/ (() => {

eval("if (navigator.geolocation) {\n  // 現在の位置情報取得を実施\n  navigator.geolocation.getCurrentPosition( // 位置情報取得成功時\n  function (pos) {\n    var latitude = pos.coords.latitude;\n    var longitude = pos.coords.longitude;\n    document.getElementById(\"latitude\").value = latitude;\n    document.getElementById(\"longitude\").value = longitude;\n  }, // 位置情報取得失敗時\n  function (pos) {\n    var location = '<div id=\"location\" class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">' + '本ブラウザでは、現在地を所得することはできません。なお、対応ブラウザーはGoogleとなります。' + '<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">' + '<span aria-hidden=\"true\">&times;</span>' + '</button>' + '</div>';\n    document.getElementById(\"location\").innerHTML = location;\n  });\n} else {\n  window.alert(\"本ブラウザではGeolocationが使えません\");\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdXNlcnRvcC5qcz85MTFlIl0sIm5hbWVzIjpbIm5hdmlnYXRvciIsImdlb2xvY2F0aW9uIiwiZ2V0Q3VycmVudFBvc2l0aW9uIiwicG9zIiwibGF0aXR1ZGUiLCJjb29yZHMiLCJsb25naXR1ZGUiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwidmFsdWUiLCJsb2NhdGlvbiIsImlubmVySFRNTCIsIndpbmRvdyIsImFsZXJ0Il0sIm1hcHBpbmdzIjoiQUFBQSxJQUFJQSxTQUFTLENBQUNDLFdBQWQsRUFBMkI7QUFDekI7QUFDQUQsRUFBQUEsU0FBUyxDQUFDQyxXQUFWLENBQXNCQyxrQkFBdEIsRUFDSTtBQUNBLFlBQVVDLEdBQVYsRUFBZTtBQUNYLFFBQU1DLFFBQVEsR0FBR0QsR0FBRyxDQUFDRSxNQUFKLENBQVdELFFBQTVCO0FBQ0EsUUFBTUUsU0FBUyxHQUFHSCxHQUFHLENBQUNFLE1BQUosQ0FBV0MsU0FBN0I7QUFDQUMsSUFBQUEsUUFBUSxDQUFDQyxjQUFULENBQXlCLFVBQXpCLEVBQXNDQyxLQUF0QyxHQUE4Q0wsUUFBOUM7QUFDQUcsSUFBQUEsUUFBUSxDQUFDQyxjQUFULENBQXlCLFdBQXpCLEVBQXVDQyxLQUF2QyxHQUErQ0gsU0FBL0M7QUFDSCxHQVBMLEVBUUk7QUFDQSxZQUFVSCxHQUFWLEVBQWU7QUFDWCxRQUFJTyxRQUFRLEdBQUcsNkZBQ0Esa0RBREEsR0FFQSw4RUFGQSxHQUdBLHlDQUhBLEdBSUEsV0FKQSxHQUtBLFFBTGY7QUFNQUgsSUFBQUEsUUFBUSxDQUFDQyxjQUFULENBQXdCLFVBQXhCLEVBQW9DRyxTQUFwQyxHQUFnREQsUUFBaEQ7QUFDSCxHQWpCTDtBQWtCQyxDQXBCSCxNQW9CUztBQUNIRSxFQUFBQSxNQUFNLENBQUNDLEtBQVAsQ0FBYSwwQkFBYjtBQUNIIiwic291cmNlc0NvbnRlbnQiOlsiaWYgKG5hdmlnYXRvci5nZW9sb2NhdGlvbikge1xuICAvLyDnj77lnKjjga7kvY3nva7mg4XloLHlj5blvpfjgpLlrp/mlr1cbiAgbmF2aWdhdG9yLmdlb2xvY2F0aW9uLmdldEN1cnJlbnRQb3NpdGlvbihcbiAgICAgIC8vIOS9jee9ruaDheWgseWPluW+l+aIkOWKn+aZglxuICAgICAgZnVuY3Rpb24gKHBvcykgeyBcbiAgICAgICAgICBjb25zdCBsYXRpdHVkZSA9IHBvcy5jb29yZHMubGF0aXR1ZGU7XG4gICAgICAgICAgY29uc3QgbG9uZ2l0dWRlID0gcG9zLmNvb3Jkcy5sb25naXR1ZGU7XG4gICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoIFwibGF0aXR1ZGVcIiApLnZhbHVlID0gbGF0aXR1ZGUgXG4gICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoIFwibG9uZ2l0dWRlXCIgKS52YWx1ZSA9IGxvbmdpdHVkZSBcbiAgICAgIH0sXG4gICAgICAvLyDkvY3nva7mg4XloLHlj5blvpflpLHmlZfmmYJcbiAgICAgIGZ1bmN0aW9uIChwb3MpIHsgXG4gICAgICAgICAgdmFyIGxvY2F0aW9uID0gJzxkaXYgaWQ9XCJsb2NhdGlvblwiIGNsYXNzPVwiYWxlcnQgYWxlcnQtd2FybmluZyBhbGVydC1kaXNtaXNzaWJsZSBmYWRlIHNob3dcIiByb2xlPVwiYWxlcnRcIj4nXG4gICAgICAgICAgICAgICAgICAgICAgICsgJ+acrOODluODqeOCpuOCtuOBp+OBr+OAgeePvuWcqOWcsOOCkuaJgOW+l+OBmeOCi+OBk+OBqOOBr+OBp+OBjeOBvuOBm+OCk+OAguOBquOBiuOAgeWvvuW/nOODluODqeOCpuOCtuODvOOBr0dvb2dsZeOBqOOBquOCiuOBvuOBmeOAgidcbiAgICAgICAgICAgICAgICAgICAgICAgKyAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjbG9zZVwiIGRhdGEtZGlzbWlzcz1cImFsZXJ0XCIgYXJpYS1sYWJlbD1cIkNsb3NlXCI+J1xuICAgICAgICAgICAgICAgICAgICAgICArICc8c3BhbiBhcmlhLWhpZGRlbj1cInRydWVcIj4mdGltZXM7PC9zcGFuPidcbiAgICAgICAgICAgICAgICAgICAgICAgKyAnPC9idXR0b24+J1xuICAgICAgICAgICAgICAgICAgICAgICArICc8L2Rpdj4nO1xuICAgICAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwibG9jYXRpb25cIikuaW5uZXJIVE1MID0gbG9jYXRpb247XG4gICAgICB9KTtcbiAgfSBlbHNlIHtcbiAgICAgIHdpbmRvdy5hbGVydChcIuacrOODluODqeOCpuOCtuOBp+OBr0dlb2xvY2F0aW9u44GM5L2/44GI44G+44Gb44KTXCIpO1xuICB9XG5cbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdXNlcnRvcC5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/usertop.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/usertop.js"]();
/******/ 	
/******/ })()
;