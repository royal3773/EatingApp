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

eval("if (navigator.geolocation) {\n  // 現在の位置情報取得を実施\n  navigator.geolocation.getCurrentPosition( // 位置情報取得成功時\n  function (pos) {\n    var latitude = pos.coords.latitude;\n    var longitude = pos.coords.longitude;\n    document.getElementById(\"latitude\").value = latitude;\n    document.getElementById(\"longitude\").value = longitude;\n  }, // 位置情報取得失敗時\n  function (pos) {\n    var location = \"<li>位置情報が取得できませんでした。</li>\";\n    document.getElementById(\"location\").innerHTML = location;\n  });\n} else {\n  window.alert(\"本ブラウザではGeolocationが使えません\");\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdXNlcnRvcC5qcz85MTFlIl0sIm5hbWVzIjpbIm5hdmlnYXRvciIsImdlb2xvY2F0aW9uIiwiZ2V0Q3VycmVudFBvc2l0aW9uIiwicG9zIiwibGF0aXR1ZGUiLCJjb29yZHMiLCJsb25naXR1ZGUiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwidmFsdWUiLCJsb2NhdGlvbiIsImlubmVySFRNTCIsIndpbmRvdyIsImFsZXJ0Il0sIm1hcHBpbmdzIjoiQUFBQSxJQUFJQSxTQUFTLENBQUNDLFdBQWQsRUFBMkI7QUFDekI7QUFDQUQsRUFBQUEsU0FBUyxDQUFDQyxXQUFWLENBQXNCQyxrQkFBdEIsRUFDSTtBQUNBLFlBQVVDLEdBQVYsRUFBZTtBQUNYLFFBQU1DLFFBQVEsR0FBR0QsR0FBRyxDQUFDRSxNQUFKLENBQVdELFFBQTVCO0FBQ0EsUUFBTUUsU0FBUyxHQUFHSCxHQUFHLENBQUNFLE1BQUosQ0FBV0MsU0FBN0I7QUFDQUMsSUFBQUEsUUFBUSxDQUFDQyxjQUFULENBQXlCLFVBQXpCLEVBQXNDQyxLQUF0QyxHQUE4Q0wsUUFBOUM7QUFDQUcsSUFBQUEsUUFBUSxDQUFDQyxjQUFULENBQXlCLFdBQXpCLEVBQXVDQyxLQUF2QyxHQUErQ0gsU0FBL0M7QUFDSCxHQVBMLEVBUUk7QUFDQSxZQUFVSCxHQUFWLEVBQWU7QUFDWCxRQUFJTyxRQUFRLEdBQUUsMkJBQWQ7QUFDQUgsSUFBQUEsUUFBUSxDQUFDQyxjQUFULENBQXdCLFVBQXhCLEVBQW9DRyxTQUFwQyxHQUFnREQsUUFBaEQ7QUFDSCxHQVpMO0FBYUMsQ0FmSCxNQWVTO0FBQ0hFLEVBQUFBLE1BQU0sQ0FBQ0MsS0FBUCxDQUFhLDBCQUFiO0FBQ0giLCJzb3VyY2VzQ29udGVudCI6WyJpZiAobmF2aWdhdG9yLmdlb2xvY2F0aW9uKSB7XG4gIC8vIOePvuWcqOOBruS9jee9ruaDheWgseWPluW+l+OCkuWun+aWvVxuICBuYXZpZ2F0b3IuZ2VvbG9jYXRpb24uZ2V0Q3VycmVudFBvc2l0aW9uKFxuICAgICAgLy8g5L2N572u5oOF5aCx5Y+W5b6X5oiQ5Yqf5pmCXG4gICAgICBmdW5jdGlvbiAocG9zKSB7IFxuICAgICAgICAgIGNvbnN0IGxhdGl0dWRlID0gcG9zLmNvb3Jkcy5sYXRpdHVkZTtcbiAgICAgICAgICBjb25zdCBsb25naXR1ZGUgPSBwb3MuY29vcmRzLmxvbmdpdHVkZTtcbiAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCggXCJsYXRpdHVkZVwiICkudmFsdWUgPSBsYXRpdHVkZSBcbiAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCggXCJsb25naXR1ZGVcIiApLnZhbHVlID0gbG9uZ2l0dWRlIFxuICAgICAgfSxcbiAgICAgIC8vIOS9jee9ruaDheWgseWPluW+l+WkseaVl+aZglxuICAgICAgZnVuY3Rpb24gKHBvcykgeyBcbiAgICAgICAgICB2YXIgbG9jYXRpb24gPVwiPGxpPuS9jee9ruaDheWgseOBjOWPluW+l+OBp+OBjeOBvuOBm+OCk+OBp+OBl+OBn+OAgjwvbGk+XCI7XG4gICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJsb2NhdGlvblwiKS5pbm5lckhUTUwgPSBsb2NhdGlvbjtcbiAgICAgIH0pO1xuICB9IGVsc2Uge1xuICAgICAgd2luZG93LmFsZXJ0KFwi5pys44OW44Op44Km44K244Gn44GvR2VvbG9jYXRpb27jgYzkvb/jgYjjgb7jgZvjgpNcIik7XG4gIH1cbiJdLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdXNlcnRvcC5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/usertop.js\n");

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