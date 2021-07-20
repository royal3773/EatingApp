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

eval("if (navigator.geolocation) {\n  // 現在の位置情報取得を実施\n  navigator.geolocation.getCurrentPosition( // 位置情報取得成功時\n  function (position) {\n    var latitude = position.coords.latitude;\n    var longitude = position.coords.longitude;\n    document.getElementById(\"latitude\").value = latitude;\n    document.getElementById(\"longitude\").value = longitude;\n  }, // 位置情報取得失敗時\n  function (position) {\n    var location = '<div id=\"location\" class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">' + '本ブラウザでは、現在地を所得することはできません。なお、対応ブラウザーはGoogleとなります。' + '<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">' + '<span aria-hidden=\"true\">&times;</span>' + '</button>' + '</div>';\n    document.getElementById(\"location\").innerHTML = location;\n  });\n} else {\n  window.alert(\"本ブラウザではGeolocationが使えません\");\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdXNlcnRvcC5qcz85MTFlIl0sIm5hbWVzIjpbIm5hdmlnYXRvciIsImdlb2xvY2F0aW9uIiwiZ2V0Q3VycmVudFBvc2l0aW9uIiwicG9zaXRpb24iLCJsYXRpdHVkZSIsImNvb3JkcyIsImxvbmdpdHVkZSIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJ2YWx1ZSIsImxvY2F0aW9uIiwiaW5uZXJIVE1MIiwid2luZG93IiwiYWxlcnQiXSwibWFwcGluZ3MiOiJBQUFBLElBQUlBLFNBQVMsQ0FBQ0MsV0FBZCxFQUEyQjtBQUN6QjtBQUNBRCxFQUFBQSxTQUFTLENBQUNDLFdBQVYsQ0FBc0JDLGtCQUF0QixFQUNJO0FBQ0EsWUFBVUMsUUFBVixFQUFvQjtBQUNoQixRQUFNQyxRQUFRLEdBQUdELFFBQVEsQ0FBQ0UsTUFBVCxDQUFnQkQsUUFBakM7QUFDQSxRQUFNRSxTQUFTLEdBQUdILFFBQVEsQ0FBQ0UsTUFBVCxDQUFnQkMsU0FBbEM7QUFDQUMsSUFBQUEsUUFBUSxDQUFDQyxjQUFULENBQXlCLFVBQXpCLEVBQXNDQyxLQUF0QyxHQUE4Q0wsUUFBOUM7QUFDQUcsSUFBQUEsUUFBUSxDQUFDQyxjQUFULENBQXlCLFdBQXpCLEVBQXVDQyxLQUF2QyxHQUErQ0gsU0FBL0M7QUFDSCxHQVBMLEVBUUk7QUFDQSxZQUFVSCxRQUFWLEVBQW9CO0FBQ2hCLFFBQUlPLFFBQVEsR0FBRyw2RkFDQSxrREFEQSxHQUVBLDhFQUZBLEdBR0EseUNBSEEsR0FJQSxXQUpBLEdBS0EsUUFMZjtBQU1BSCxJQUFBQSxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsVUFBeEIsRUFBb0NHLFNBQXBDLEdBQWdERCxRQUFoRDtBQUNILEdBakJMO0FBa0JDLENBcEJILE1Bb0JTO0FBQ0hFLEVBQUFBLE1BQU0sQ0FBQ0MsS0FBUCxDQUFhLDBCQUFiO0FBQ0giLCJzb3VyY2VzQ29udGVudCI6WyJpZiAobmF2aWdhdG9yLmdlb2xvY2F0aW9uKSB7XG4gIC8vIOePvuWcqOOBruS9jee9ruaDheWgseWPluW+l+OCkuWun+aWvVxuICBuYXZpZ2F0b3IuZ2VvbG9jYXRpb24uZ2V0Q3VycmVudFBvc2l0aW9uKFxuICAgICAgLy8g5L2N572u5oOF5aCx5Y+W5b6X5oiQ5Yqf5pmCXG4gICAgICBmdW5jdGlvbiAocG9zaXRpb24pIHsgXG4gICAgICAgICAgY29uc3QgbGF0aXR1ZGUgPSBwb3NpdGlvbi5jb29yZHMubGF0aXR1ZGU7XG4gICAgICAgICAgY29uc3QgbG9uZ2l0dWRlID0gcG9zaXRpb24uY29vcmRzLmxvbmdpdHVkZTtcbiAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCggXCJsYXRpdHVkZVwiICkudmFsdWUgPSBsYXRpdHVkZSBcbiAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCggXCJsb25naXR1ZGVcIiApLnZhbHVlID0gbG9uZ2l0dWRlIFxuICAgICAgfSxcbiAgICAgIC8vIOS9jee9ruaDheWgseWPluW+l+WkseaVl+aZglxuICAgICAgZnVuY3Rpb24gKHBvc2l0aW9uKSB7IFxuICAgICAgICAgIHZhciBsb2NhdGlvbiA9ICc8ZGl2IGlkPVwibG9jYXRpb25cIiBjbGFzcz1cImFsZXJ0IGFsZXJ0LXdhcm5pbmcgYWxlcnQtZGlzbWlzc2libGUgZmFkZSBzaG93XCIgcm9sZT1cImFsZXJ0XCI+J1xuICAgICAgICAgICAgICAgICAgICAgICArICfmnKzjg5bjg6njgqbjgrbjgafjga/jgIHnj77lnKjlnLDjgpLmiYDlvpfjgZnjgovjgZPjgajjga/jgafjgY3jgb7jgZvjgpPjgILjgarjgYrjgIHlr77lv5zjg5bjg6njgqbjgrbjg7zjga9Hb29nbGXjgajjgarjgorjgb7jgZnjgIInXG4gICAgICAgICAgICAgICAgICAgICAgICsgJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2xvc2VcIiBkYXRhLWRpc21pc3M9XCJhbGVydFwiIGFyaWEtbGFiZWw9XCJDbG9zZVwiPidcbiAgICAgICAgICAgICAgICAgICAgICAgKyAnPHNwYW4gYXJpYS1oaWRkZW49XCJ0cnVlXCI+JnRpbWVzOzwvc3Bhbj4nXG4gICAgICAgICAgICAgICAgICAgICAgICsgJzwvYnV0dG9uPidcbiAgICAgICAgICAgICAgICAgICAgICAgKyAnPC9kaXY+JztcbiAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcImxvY2F0aW9uXCIpLmlubmVySFRNTCA9IGxvY2F0aW9uO1xuICAgICAgfSk7XG4gIH0gZWxzZSB7XG4gICAgICB3aW5kb3cuYWxlcnQoXCLmnKzjg5bjg6njgqbjgrbjgafjga9HZW9sb2NhdGlvbuOBjOS9v+OBiOOBvuOBm+OCk1wiKTtcbiAgfVxuXG4iXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3VzZXJ0b3AuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/usertop.js\n");

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