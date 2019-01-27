import random

colNames = "name, id, diversification, free_cash, volativity, activity"
personNames = ["Cayden Pierce", "Wayne Cen", "Stephen Choi", "Maher Hooha", "John James", "Nate Smith", "Don Ron", "Jill Pier", "Uta Kansas", "Laura Lo"]


with open("users.csv", 'a') as f:
	f.write(colNames + '\n')
	for i in range(10):
		f.write(personNames[i] + ",{},{},{},{},{}\n".format(i, random.random(), random.random(),random.random(),random.random()))


		
	
