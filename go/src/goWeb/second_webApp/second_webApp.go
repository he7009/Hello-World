package main

import (
	"fmt"
	"net/http"
)

func Duanyude(w http.ResponseWriter, r *http.Request) {
	fmt.Fprint(w, "Hello Duanyude!")
}

func Helillan(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "Hello Helilan")
}

func main() {
	server := http.Server{
		Addr: "127.0.0.1:8088",
	}

	http.HandleFunc("/helilan", Helillan)
	http.HandleFunc("/duanyude", Duanyude)

	server.ListenAndServe()
}
