var mongoose = require("mongoose");

var portfolioSchema = new mongoose.Schema({
    sectors: Array,
    freeCash: Number,
    learningProgress: Number,
    learningRank: String,
    stockInvested: Array, //the array will be stock Id's
    strategyType: String, 
    userGroupings: String,
    user: {
           id: {
                type: mongoose.Schema.Types.ObjectId,
                ref: "User"
            }
        },
    stock: [{
        type: mongoose.Schema.Types.ObjectId,
        ref: "Stock"
    }]
})

module.exports = mongoose.model("Portfolio", portfolioSchema);