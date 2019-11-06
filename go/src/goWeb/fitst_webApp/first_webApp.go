package main

import (
	"fmt"
	"net/http"
)

func handlers(writer http.ResponseWriter, request *http.Request) {
	fmt.Fprintf(writer, "Hello World %s", request.URL.Path[1:])
}

func main() {
	http.HandleFunc("/", handlers)
	http.ListenAndServe(":8088", nil)
}
