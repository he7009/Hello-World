package main

import (
	"fmt"
	"net/http"
)

func rootHandler(w http.ResponseWriter, r *http.Request) {
	fmt.Print(r.Header.Get("Referer"))
	fmt.Fprintln(w, "Hello World! GO Duanyude!")
}

func main() {
	server := http.Server{
		Addr: "127.0.0.1:8088",
	}
	http.HandleFunc("/", rootHandler)

	server.ListenAndServe()
}
