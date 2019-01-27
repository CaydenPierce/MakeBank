from scipy.spatial.distance import cosine
import pandas
import numpy as np
import sys

#model vectors - diversification, free_cash, volatility, activity

models = {'low' : [1,1,0,0],
'med' : [0.5,0.5,0.5,0.5],
'high' : [0,0,1,1]}

#passed in values - user_id, diversity, free_cash, volatility, activity

user = []
for val in sys.argv[2:]:
	user.append(float(val))

def main():
	#compute similiarity
	maximum = 1.0
	for i, modeltype in enumerate(models):
		sim = cosine(user, models[modeltype])
		#print("Type: {}, sim: {}, max: {}".format(modeltype, sim, maximum))
		if sim <= maximum:
			maximum = sim
			userType = i

	return userType
	
