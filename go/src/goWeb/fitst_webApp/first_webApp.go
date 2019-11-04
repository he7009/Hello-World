package main

import (
	"fmt"
	"net/http"
)

func handlerss(writer http.ResponseWriter, request *http.Request) {
	fmt.Fprintf(writer, "Hello World", request.URL.Path[1:])
}

func main() {
	http.HandleFunc("/", handlerss)
	http.ListenAndServe(":8088", nil)
}
