package main

import (
	"fmt"
	"io/ioutil"
)

func variable() {
	var (
		aaa string
		bbb int
		ccc bool
		ddd int32
	)
	println(aaa,bbb,ccc,ddd)
}



func readfile(){
	if contenst,err := ioutil.ReadFile("aaa.txt"); err != nil {
		fmt.Println(err)
	}else {
		fmt.Printf("%s",contenst)
	}
}

func goswitch(fs int) string  {
	var result string
	switch  {
	case fs < 0 || fs > 100:
		result = "错误的分数：" + string(fs)
	case fs < 60:
		result = "不及格"
	case fs < 70:
		result = "及格"
	case fs < 80:
		result = "良好"
	case fs < 90:
		result = "优秀"
	case fs < 100:
		result = "完美"
	}
	return result
}


func main() {
	//fmt.Print("--01 start--")
	//variable()
	//goif(0)
	readfile()
	result := goswitch(80)
	println(result)
}
