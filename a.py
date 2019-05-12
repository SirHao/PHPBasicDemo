import sys
def send():
	list_a=[alist for alist in sys.argv[1].strip().split(',')]
	list_b=[blist for blist in sys.argv[2].strip().split(",")]
	for i in list_a:
		print(i)
	print("===========")
	for j in list_b:
		print(j)
	return "dfsfasdfasf"
if __name__=="__main__":
	send()