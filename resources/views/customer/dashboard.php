<?php include 'header.php'; ?>
            <!-- List of All The Transactions -->
            <div class="px-4 sm:px-6 lg:px-8">
              <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                  <p class="mt-2 text-sm text-gray-700">
                    Here's a list of all your transactions which inlcuded
                    receiver's name, email, amount and date.
                  </p>
                </div>
              </div>
              <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div
                    class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                      <thead>
                        <tr>
                          <th
                            scope="col"
                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                            User Name
                          </th>
                          <th
                            scope="col"
                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                            Email
                          </th>
                          <th
                            scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Amount
                          </th>
                          <th
                            scope="col"
                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Date
                          </th>
                            <th
                                 scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Remarks
                            </th>
                        </tr>
                      </thead>

                      <tbody class="divide-y divide-gray-200 bg-white">
                        <tr>
                          <td
                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-800 sm:pl-0">
                            Bruce Wayne
                          </td>
                          <td
                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500 sm:pl-0">
                            bruce@wayne.com
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm font-medium text-emerald-600">
                            +$10,240
                          </td>
                          <td
                            class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                            29 Sep 2023, 09:25 AM
                          </td>
                            <td
                                    class="whitespace-nowrap px-2 py-4 text-sm text-gray-500">
                                Deposited
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
<?php include 'footer.php' ?>
