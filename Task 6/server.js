const express = require('express');
const app = express();
const mongoose = require('mongoose');
const jwt = require('jsonwebtoken');

mongoose.connect('mongodb://localhost:27017/mydatabase', { useNewUrlParser: true, useUnifiedTopology: true });

const User = mongoose.model('User', {
  email: String,
  password: String,
});

app.post('/login', (req, res) => {
  const { email, password } = req.body;
  User.findOne({ email }, (err, user) => {
    if (err) {
      res.status(500).send({ message: 'Error logging in' });
    } else if (!user) {
      res.status(401).send({ message: 'Invalid email or password' });
    } else {
      const token = jwt.sign({ userId: user._id }, 'mysecretkey', { expiresIn: '1h' });
      res.send({ token });
    }
  });
});

app.post('/signup', (req, res) => {
  const { email, password } = req.body;
  const user = new User({ email, password });
  user.save((err) => {
    if (err) {
      res.status(500).send({ message: 'Error signing up' });
    } else {
      res.send({ message: 'User created successfully' });
    }
  });
});

app.listen(3000, () => {
  console.log('Server started on port 3000');
});